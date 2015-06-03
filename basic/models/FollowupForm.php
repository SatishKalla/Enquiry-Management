<?php 
//Model

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * EnquiryForm is the model for EnquiryController.
 */
class FollowupForm extends ActiveRecord
{
	public static function tableName()
    {
        return 'followups';
    }
     
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
    	      return [
            // name, email, subject and body are required
            [['name', 'issueddate', 'status'], 'required'],          
            ];
    }

  //lables
    public function attributeLabels()
    {
        return [
            'name' 			=> 'UserName',
            'issueddate' 	=> 'Resolved Date',
            'status' 		=> 'Status',       
           
        ];
    }




}

