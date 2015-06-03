<?php 
//Model

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * EnquiryForm is the model for EnquiryController.
 */
class EnquiryForm extends ActiveRecord
{
	public static function tableName()
    {
        return 'enquiry';
    }
     
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
    	      return [
            // name, email, subject and body are required
            [['name', 'date', 'purpose', 'contactno'], 'required'],
            ['description','string'],           
            ];
    }
  //lables
    public function attributeLabels()
{
    return [
        'name' 			=> 'UserName',
        'date' 			=> 'Date',
        'purpose' 		=> 'Purpose',
        'description'	=> 'Description',
        'contactno' 	=> 'Contact Number',
       
    ];
}


}

