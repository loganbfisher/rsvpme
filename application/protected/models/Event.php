<?php

/**
 * This is the model class for table "events".
 *
 * The followings are the available columns in table 'events':
 * @property integer $event_id
 * @property string $name
 * @property string $details
 * @property string $where
 * @property string $day
 * @property string $time
 * @property string $guest_messsage
 */
class Event extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Event the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, details, where, day, time, confirmation_code', 'required'),
			array('name, details, where, day, time, guest_messsage', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('event_id, name, details, where, day, time, guest_messsage', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                   'entrys'=>array(self::HAS_MANY, 'Entry', 'event_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'event_id' => 'Event',
			'name' => 'Name',
			'details' => 'Details',
			'where' => 'Where',
			'day' => 'Day',
			'time' => 'Time',
			'guest_messsage' => 'Guest Messsage',
                        'confirmation_code' => 'Confirmation Code',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('where',$this->where,true);
		$criteria->compare('day',$this->day,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('guest_messsage',$this->guest_messsage,true);
                $criteria->compare('confirmation_code',$this->confirmaton_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}