<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $roll_no;
    public $name;
    public $branch;
    public $contact;
    public $email;
    public $password;
    public $gotohell;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['roll_no', 'required'],
            ['roll_no', 'trim'],
            ['roll_no', 'string', 'max' => 6],
            ['roll_no', 'string', 'min' => 6],
            ['roll_no', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This Roll Number is already associated with an Account. Please check your Roll Number or contact the Administrators regarding this problem. Thank You !'],

            ['name', 'required'],

            ['branch', 'required'],

            ['contact', 'required'],
            ['contact', 'string', 'min' => 10],
            ['contact', 'string', 'max' => 10],
            ['contact', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This Contact Number is already associated with an Account. Please try with a different number or contact the Administrators regarding this problem. Thank You !'], 

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address is already associated with an account. Please try again with a different Email-ID or contact the Administrators regarding this problem. Thank You !'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->roll_no = $this->roll_no;
        $user->name = $this->name;
        $user->branch = $this->branch;
        $user->contact= $this->contact;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}


/*
            ['roll_no','trim'],
            ['roll_no', 'required'],
            ['roll_no', 'unique', 'targetClass' => '\common\models\User', 'message' => 'An account with this Roll Number already exists. Please try again or contact the Administrators regarding this problem. Thank You !'],

            ['name','required'],
            ['name','string','max' => 45],

            ['contact','required'],
            ['contact','trim'],
            ['contact','min' =>10, 'max' =>10, 'targetClass'=> '\common\models\User', 'message'=>'Please enter a valid Contact Number. Please avoid usinng Country Code or 0. Thank You !'],
            ['contact','unique','targetClass'=>'\common\models\User', 'message'=>'This Number is already registered. Please try again with a different number or contact our Administrators regarding this problem. Thank You !'],

            */
