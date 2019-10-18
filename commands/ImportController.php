<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\User;
use app\models\Loan;
/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ImportController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */

    public function actionLoans()
    {

        $loans  = json_decode( file_get_contents("./loans.json"), true);
        
        foreach ($loans as $loan) {
            $model = new Loan;
          //  $model->load($loan);
            $model->id = $loan['id'];
            $model->user_id = $loan['user_id'];
            $model->amount = $loan['amount'];
            $model->interest = $loan['interest'];
            $model->duration = $loan['duration'];
            $model->campaign = $loan['campaign'];
            $model->status = $loan['status'];
            $model->start_date = date("Y-m-d", $loan['start_date']);
            $model->end_date = date("Y-m-d", $loan['end_date']);
            $model->save();
        }

            echo "Records Added Successfully";
    }



    public function actionUsers()
    {
     //   echo $message . "\n";
    
    $users	=file_get_contents("./users.json");
    //echo $users;
    $usersArr = json_decode($users, true);

    foreach ($usersArr as $user) {
        # code...
        $model = new User();
      //  $model->first_name = $user["first_name"];
       // $model->last_name = $user["last_name"];
       // $model->load($user);
        $model->first_name = $user["first_name"];
        $model->last_name = $user["last_name"];
        $model->id = $user["id"];
        $model->email = $user["email"];
        $model->personal_code = $user["personal_code"];
        $model->phone = $user["phone"];
        $model->active = $user["active"];
        $model->dead = $user["dead"];
        $model->lang = $user["lang"];
        $model->save();

    }

    echo "Records Successfully added!";
    }
}
