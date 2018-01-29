<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\models\user;

use dektrium\user\models\RegistrationForm;
use Yii;
use app\models\Contacts;

/**
 * Description of ApplicantRegistrationForm
 *
 * @author Валим
 */
class ApplicantRegistrationForm extends RegistrationForm{
    public $first_name;
    public $middle_name;
    public $last_name;
    public $password_repeat;
    public $pictures_id;
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
            'requiredPicture' => ['pictures_id','required'],
            'MainPhone' => ['main_phone','required'],
            'contacts' => ['contacts','safe'],
            'MainPhone2' =>[['main_phone'], 'match', 'pattern' => '/\(?([0-9]{2})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'],
        ];
    }
    
    public function register()
    {
        if (!$this->validate()) {
            return false;
        }

        /** @var User $user */
        $user = new User();
        $user->setScenario('register');
        $this->loadAttributes($user);
        
        if (!$user->register()) {
            return false;
        }
        
        $assigment = Yii::createObject([
          'class'   => \dektrium\rbac\models\Assignment::className(),
          'user_id' => $user->id,
        ]);

 
        $assigment->items[0] = 'Соискатель';
        $assigment->updateAssignments();
        
        
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
            $userHasContacts = new \app\models\UserHasContacts();
            $userHasContacts->contacts_id = $contact->id;
            $userHasContacts->user_id = $user->id;
            $userHasContacts->save();
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

}
