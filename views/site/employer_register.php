<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

  <div class='inner-wrap'>

        <div class="firw">
            <h1 id="mw">Регистрация работодателя</h1>
        </div>
      
        <form name="formm" onsubmit="return validation()" class="inputs" method="post" action="php.php">
       
            <p id="tlt" style="margin: 10px 0 0 0">Персональная информация</p>

            <div class="mname">
                
                <div class="onei">
                    <label class='lable-form'>E-mail<span class="red-star" id='valid'> *</span></label>
                    <input id="emailval" type="email" name="email" required>
                </div>

                <div class="pas">
                    <div class="onei">
                        <label class='lable-form'>Пароль<span class="red-star"> *</span></label>
                        <input type="password" name="password" id='pas1' required>
                    </div>

                    <div class="onei">
                        <label class='lable-form'>Повторить пароль<span class="red-star"> *</span></label>
                        <input type="password" name="password" id='pas2' required>
                    </div>
                </div>

                <div>
                    <div class="onei">
                        <label class='lable-form'>Фамилия<span class="red-star"> *</span></label>

                        <input type="text" name="name" required>
                    </div>
                    <div class="onei">
                        <label class='lable-form'>Имя<span class="red-star"> *</span></label>
                        <input type="text" name="last_name" required>
                    </div>
                    <div class="onei" id="name">
                        <label class='lable-form1'>Отчество</label>
                        <input type="text" name="second_name" required="off">
                    </div>

                </div>
                <div class="onei" id='hiddenInput'>
                    <label class='lable-form' class='posts' type='text'>Должность<span class="red-star"> *</span></label>
                    <input type="text" class='posts' name="posts" required>
                </div>
         
            </div>
           
            <input type="submit" style="margin-top" 50px; class="btn-style " value="Зарегистрироваться " />
        </form>
    </div>