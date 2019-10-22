<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "loan".
 *
 * @property int $id
 * @property int $user_id
 * @property string $amount
 * @property string $interest
 * @property int $duration
 * @property string $start_date
 * @property string $end_date
 * @property int $campaign
 * @property bool $status
 */
class Loan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'amount', 'interest', 'duration', 'start_date', 'end_date', 'campaign'], 'required'],
            [['user_id', 'duration', 'campaign'], 'default', 'value' => null],
            [['user_id', 'duration', 'campaign'], 'integer'],
            [['amount', 'interest'], 'number'],
            [['start_date', 'end_date'], 'safe'],
            [['status'], 'boolean'],
           [['status'], 'default', 'value'=> true],
           ["user_id", "exist", "targetClass" => "\app\models\User", "targetAttribute" => "id","message"=>"User Not Found"],
        ];
    }

    public static function total()
    {
        $Loans = Loan::find()->all();
        $total=0;
        foreach ($Loans as $Loan) {
            $total += $Loan->amount;
                    }

       return $total;

    }

      public function getUser()

    {

        return $this->hasOne(User::className(), ['id' => 'user_id']);

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'amount' => 'Amount',
            'interest' => 'Interest',
            'duration' => 'Duration',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'campaign' => 'Campaign',
            'status' => 'Status',
        ];
    }
}
