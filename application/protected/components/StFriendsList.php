<?php

/**
 * StFriendsList displays a list of friends belonging to the current user.
 *
 * Example:
 * <pre>
 * $this->widget('StFriendsList',array('user_id'=>Yii::app()->user->getId()));
 * </pre>
 */
class StFriendsList extends CWidget
{
	/**
	 * @var integer the number of friends to show. Defaults to 8.
	 */
	public $limit=8;

	public $user_id;
	public $username;

	/**
	 * Executes the widget.
	 * This method registers all needed client scripts and renders
	 * the friends list.
	 */
	public function run()
	{
		if ($this->user_id === null)
			throw new Exception('Missing $user_id for StFriendsList');

		if ($this->username === null)
			throw new Exception('Missing $username for StFriendsList');

		$criteria = new CDbCriteria;
		$criteria->condition = 't.user_id = ?';
		$criteria->params = array($this->user_id);
		$criteria->limit = $this->limit;
		$criteria->with = 'friend_user';

		$friends = User_friend::model()->findAll($criteria);

		$this->render('friends_list', array(
			'friends'=>$friends,
			'username'=>$this->username,
			'is_owner'=>($this->user_id === Yii::app()->user->id),
		));
	}
}
