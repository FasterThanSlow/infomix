<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\models\user;

use dektrium\user\models\RegistrationForm;
use Yii;
use app\models\Organizations;
use app\models\Members;
use app\models\Contacts;
/**
 * Description of EmployerRegistrationForm
 *
 * @author Валим
 */
class EmployerRegistrationForm extends RegistrationForm{
    public $first_name;
    public $middle_name;
    public $last_name;
    public $password_repeat;
    public $title;
    public $institutional_legal_form;
    public $unp;
    public $legal_address;
    public $cities_id;
    public $pictures_id;
    public $post;
    public $main_phone;
    public $contacts;
    
    public function rules()
    {
        $user = $this->module->modelMap['User'];

        return [
            // username rules
            'usernameLength'   => ['username', 'string', 'min' => 3, 'max' => 255],
            'usernameTrim'     => ['username', 'filter', 'filter' => 'trim'],
            'usernamePattern'  => ['username', 'match', 'pattern' => $user::$usernameRegexp],
            'usernameRequired' => ['username', 'required'],
            'usernameUnique'   => [
                'username',
                'unique',
                'targetClass' => $user,
                'message' => Yii::t('user', 'This username has already been taken')
            ],
            // email rules
            'emailTrim'     => ['email', 'filter', 'filter' => 'trim'],
            'emailRequired' => ['email', 'required'],
            'emailPattern'  => ['email', 'email'],
            'emailUnique'   => [
                'email',
                'unique',
                'targetClass' => $user,
                'message' => Yii::t('user', 'This email address has already been taken')
            ],
            // password rules
            'passwordRequired' => ['password', 'required', 'skipOnEmpty' => $this->module->enableGeneratingPassword],
            'passwordLength'   => ['password', 'string', 'min' => 6, 'max' => 255],
            'passwordRepeat' => ['password_repeat', 'required'],
            'passwordRepeatComp' => ['password_repeat', 'compare', 'compareAttribute'=>'password','message'=>'Пароли не совпадают'],
            // names rules 
            'firstNameRequired' => ['first_name','required'],
            'firstNameLength'   => ['first_name', 'string', 'min' => 2, 'max' => 255],
            'middleNameRequired' => ['middle_name','required'],
            'middleNameLength'   => ['middle_name', 'string', 'min' => 2, 'max' => 255],
            'lastNameRequired' => ['last_name','safe'],
            'requiredCity' => ['cities_id','required'],
            'requiredPicture' => ['pictures_id','required'],
            'requiredAddress' => ['legal_address','required'],
            'requiredUNP' => ['unp','required'],
            'requiredLegal' => ['institutional_legal_form','required'],
            'requiredTitle' => ['title','required'],
            'MemberPost' => ['post','required'],
            'MainPhone' => ['main_phone','required'],
            'contacts' => ['contacts','safe'],
            'unp' => ['unp','integer'],
            'MainPhone2' =>[['main_phone'], 'match', 'pattern' => '/\(?([0-9]{2})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'],
        ];
    }
    
    public function register()
    {
        if (!$this->validate()) {
            return false;
        }

        /** @var User $user */
        $user = Yii::createObject(User::className());
        $user->setScenario('register');
        $this->loadAttributes($user);
        
        if (!$user->register()) {
            return false;
        }
        
        $assigment = Yii::createObject([
          'class'   => \dektrium\rbac\models\Assignment::className(),
          'user_id' => $user->id,
        ]);

 
        $assigment->items[0] = 'Работодатель';
        $assigment->updateAssignments();
        
        $organization = new Organizations;
        $organization->setAttributes($this->attributes);

        if(!$organization->save()){
            return false;
        }
          
        $member = new Members();
        $member->post = $this->attributes['post'];
        $member->user_id = $user->id;
        $member->organizations_id = $organization->id;
        
        if(!$member->save()){
            return false;
        }

        $phone = new Contacts();
        $phone->value = $this->attributes['main_phone'];
        $phone->contact_types_id = 1;
        
        if(!$phone->save()){
            return false;
        }
        
        $i = 0;$j = 0;
        $count = count($this->attributes['contacts']);
        $contacts = [];
        while($i < $count){
            $contacts[$j] = new Contacts();
            $contacts[$j]->contact_types_id = $this->attributes['contacts'][$i]['type'];
            $contacts[$j]->value = $this->attributes['contacts'][$i + 1]['value'];
            $contacts[$j]->save();
            $i+=2;$j++;
        }
        
        $contacts[] = $phone;
        
        foreach ($contacts as $contact){
            $organizationHasContacts = new \app\models\OrganizationsHasContacts();
            $organizationHasContacts->contacts_id = $contact->id;
            $organizationHasContacts->organizations_id = $organization->id;
            $organizationHasContacts->save();
        }
                
        Yii::$app->session->setFlash(
            'info',
            Yii::t(
                'user',
                'Your account has been created and a message with further instructions has been sent to your email'
            )
        );

        return Yii::$app->response->redirect(\yii\helpers\Url::to(['/site/index', 'reg' => 'true']));
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email'    => Yii::t('user', 'Email'),
            'username' => Yii::t('user', 'Username'),
            'password' => Yii::t('user', 'Password'),
            'first_name' => 'Имя',
            'middle_name' => 'Фамилия',
            'last_name' => 'Отчество'
        ];
    }
    
}
