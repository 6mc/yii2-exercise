<?php

namespace app\models;

/**
 * Class User
 *
 * @package app\models
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
public function rules()
{
return [
       
        [['first_name', 'email', 'phone', 'last_name','personal_code'], 'required'],
        ['personal_code', 'integer'],
        [['first_name','last_name'], 'match', 'pattern'=>'/^[a-zA-ZñÑáéíóúñÁÉÍÓÚÑ\s]+$/'],
        ['phone','integer'],
        ['email','email'],
        ['active', 'boolean'],
        ['dead', 'boolean'],
        ['lang', 'string']
    ];
}

    public static function tableName()   
    {   
        return 'user';   
    }


      public function getLoans()

    {

        return $this->hasMany(Loan::className(), ['user_id' => 'id']);

    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
        public function age()
    {
       $date = new \DateTime(substr($this->personal_code, 5,2)."-".substr($this->personal_code, 3, 2) ."-" . strval(18 + ceil(substr($this->personal_code, 0, 1)/2-1))  . substr($this->personal_code, 1, 2));
        $now = new \DateTime();
      $interval = $now->diff($date);
        return $interval->y;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
