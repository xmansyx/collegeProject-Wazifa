<?php



	class database{
		private $localhost;
		private $dbuser;
		private $dbpass;
		private $dbname;
		private $connection;


		public function __construct (){
			$this->localhost="localhost";
			$this->dbuser="root";
			$this->dbpass="";
			$this->dbname="wazifa";
			$this->connection=mysqli_connect($this->localhost,$this->dbuser,$this->dbpass,$this->dbname="wazifa");
		}

		public function regNewUser($username,$email,$age,$password,$fname,$lname){
			$query ="INSERT INTO user (username,email,age,password,firstname,lastname) VALUES ('$username','$email',$age,'$password','$fname','$lname');";
			
			 if (mysqli_query($this->connection,$query)) {
			  	$this->adduserprofile($email);
			  	return true;
			  } 
		}
		public function loginbyusername($username,$password){
			$resaults=mysqli_query($this->connection,"SELECT user.iduser,user.firstname,user.lastname,user.username,user.password,user.type,profile.img FROM user join profile on user.iduser=profile.user_iduser WHERE user.username='$username' AND user.password='$password'" );
				while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
					$user['iduser'] =  $row['iduser'];
					$user['username'] =  $row['username'];
					$user['img'] = $row['img'];
					$user['password'] = $row['password'];
					$user['firstname'] = $row['firstname'];
					$user['lastname'] = $row['lastname'];
					$user['type'] = $row['type'];
					$user_list[] = $user;
				}
				return $user_list;
		}
		public function adduserprofile($email){
			$query ="INSERT INTO profile (user_iduser) SELECT iduser FROM user WHERE email = '$email';";
			if(mysqli_query($this->connection,$query)){
				return true;
			}
		}

		public function addfriend($userid,$friendid){
			$query ="INSERT INTO friendlist (user_iduser,user_idfriend,status) VALUES ($userid,$friendid,'friendrequest');";
			mysqli_query($this->connection,$query);
		}
		public function addfollow($userid,$followid){
			$query="INSERT INTO followerlist (user_iduser,user_idfollow) VALUES ($userid,$followid);";
			mysqli_query($this->connection,$query);
		}
		public function addpost($userid,$postcontent){
			$query="INSERT INTO post (user_iduser,postcontent) VALUES ($userid,'$postcontent');";
			if(mysqli_query($this->connection,$query)){
				return true;
			}
			else{
				return false;
			}
		}
		public function addlike($userid,$postid){
			$query="INSERT INTO likes (userid,postid) VALUES ($userid,$postid);";
			mysqli_query($this->connection,$query);
		}
		public function addcomment($userid,$postid,$commentcontent){
			$query="INSERT INTO comment (commentcontent,post_idpost,userid) VALUES ('$commentcontent',$postid,$userid);";
			mysqli_query($this->connection,$query);
		}
		public function addmessage($senderid,$recieverid,$messagecontent){
			$query="INSERT INTO message ('messagecontent',user_idusersender,user_iduserreciever)
			VALUES ('$messagecontent',$senderid,$recieverid);";
			mysqli_query($this->connection,$query);
		}
		public function addnotification($type,$userid,$ownerid){
			$query="INSERT INTO notification (nottype,user_iduser,user_iduserowner) VALUES ('$type',$userid,$ownerid);";
			mysqli_query($this->connection,$query);
		}
		public function addshare($userid,$postid){
			$query="INSERT INTO share (userid,postid) VALUES ($userid,$postid);";
			mysqli_query($this->connection,$query);
		}
		public function getuserinfobyid($userid){
			$resaults=mysqli_query($this->connection,"SELECT * FROM user WHERE iduser=$userid");
				while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
					$user['iduser'] =  $row['iduser'];
					$user['username'] =  $row['username'];
					$user['age'] = $row['age'];
					$user['password'] = $row['password'];
					$user['email']=$row['email'];
					$user['firstname'] = $row['firstname'];
					$user['lastname'] = $row['lastname'];
					$user_list[] = $user;
				}
				return $user_list;
		}
		public function getuserinfobyusername($username){
			$resaults=mysqli_query($this->connection,"SELECT * FROM user WHERE username='$username'");
			while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
					$user['iduser'] =  $row['iduser'];
					$user['username'] =  $row['username'];
					$user['age'] = $row['age'];
					$user['password'] = $row['password'];
					$user['firstname'] = $row['firstname'];
					$user['lastname'] = $row['lastname'];
					$user_list[] = $user;
				}

				return $user_list;
		}
		public function getuserinfobyemail($email){
			$resaults=mysqli_query($this->connection,"SELECT * FROM user WHERE email='$email'");
			while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
					$user['iduser'] =  $row['iduser'];
					$user['username'] =  $row['username'];
					$user['age'] = $row['age'];
					$user['password'] = $row['password'];
					$user['firstname'] = $row['firstname'];
					$user['lastname'] = $row['lastname'];
					$user_list[] = $user;
				}
				return $user_list;
		}

		public function getallusermessages($userid){
			//first name 
			//lastname 
			$resaults=mysqli_query($this->connection,"SELECT user.firstname,user.lastname,user.iduser,message.idmessage FROM message JOIN user ON user.iduser = message.user_idusersender  WHERE user_idusersender='$userid'");
				while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
					$message['firstname'] =  $row['firstname'];
					$message['lastname'] = $row['lastname'];
					$message['messageid'] =  $row['idmessage'];
					$message['iduser'] = $row['iduser'];				
					$message_list[] = $message;
				}
				return $message_list;
		}
		public function get2usermessages($messageid){
			$resaults=mysqli_query($this->connection,"SELECT * FROM message 
				WHERE idmessage=$messageid");
				while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
					$message['iduser'] =  $row['idmessage'];
					$message['messagecontent'] =  $row['messagecontent'];
					$message['user_idusersender'] = $row['user_idusersender'];
					$message['user_iduserreciever'] = $row['user_iduserreciever'];
					$message_list[] = $message;
				}
				return $message_list;
		}
		public function showfriendlist($userid){
			$resaults=mysqli_query($this->connection,"SELECT user.firstname, user.lastname,user.iduser,profile.img FROM friendlist JOIN user JOIN profile ON friendlist.user_idfriend = user.iduser = profile.user_iduser WHERE friendlist.user_iduser = $userid AND friendlist.status='friend' UNION SELECT user.firstname, user.lastname,user.iduser,profile.img FROM friendlist JOIN user JOIN profile ON friendlist.user_idfriend = user.iduser = profile.user_iduser WHERE friendlist.user_idfriend = $userid AND friendlist.status='friend'");
				
				while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
				$friend['firstname'] =  $row['firstname'];
				$friend['lastname'] =  $row['lastname'];
				$friend['iduser'] =  $row['iduser'];
				$friend['img'] =  $row['img'];
				$friends_list[] = $friend;
			}
			return $friends_list;
		}
		
	public function showfollowlist($userid){
			$resaults=mysqli_query($this->connection,"SELECT user.firstname, user.lastname,user.iduser,profile.img FROM followerlist JOIN user JOIN profile ON followerlist.user_idfollow = user.iduser = profile.user_iduser WHERE followerlist.user_iduser = '$userid '");

				while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
				$follower['firstname'] =  $row['firstname'];
				$follower['lastname'] =  $row['lastname'];
				$follower['iduser'] =  $row['iduser'];
				$follower['img'] =  $row['img'];
				$followers_list[] = $follower;
			}
			return $followers_list;
		}
		public function showfollowinglist($userid){
			$resaults=mysqli_query($this->connection,"SELECT user.firstname, user.lastname,user.iduser,profile.img FROM followerlist JOIN user JOIN profile ON followerlist.user_iduser = user.iduser = profile.user_iduser WHERE followerlist.user_idfollow = '$userid'"); 

			 while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
				$following['firstname'] =  $row['firstname'];
				$following['lastname'] =  $row['lastname'];
				$following['iduser'] =  $row['iduser'];
				$following['img'] =  $row['img'];
				$following_list[] = $following;
			}
			return $following_list;
		
		}
		public function showuserposts($userid){
			$resaults=mysqli_query($this->connection,"SELECT * FROM post WHERE user_iduser=$userid");
			while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
				$userposts['postcontent'] =  $row['postcontent'];
				$userposts['idpost'] =  $row['idpost'];
				$userposts['postdate'] =  $row['postdate'];
				$userposts['user_iduser'] =  $row['user_iduser'];

				$posts_list[] = $userposts;
			}
			return $posts_list;		
		}
		public function showpostlikes($postid){
			$resaults=mysqli_query($this->connection,"SELECT user.firstname, user.lastname,profile.img,user.iduser FROM likes JOIN user ON likes.userid = user.iduser = profile.user_iduser WHERE likes.postid = $postid ");
			while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
				$userlikes['firstname'] =  $row['firstname'];
				$userlikes['lastname'] =  $row['lastname'];
				$userlikes['img'] =  $row['img'];
				$userlikes['user_iduser'] =  $row['user_iduser'];

				$likes_list[] = $userlikes;
			}
			return $likes_list;	
		}
		public function showpostcomments($postid){
			$resaults=mysqli_query($this->connection,"SELECT user.firstname, user.lastname,comment.commentcontent,comment.commentdate,comment.userid FROM comment JOIN user ON comment.userid = user.iduser WHERE comment.postid = $postid ");
			while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
				$usercomments['firstname'] =  $row['firstname'];
				$usercomments['lastname'] =  $row['lastname'];
				$usercomments['img'] =  $row['img'];
				$usercomments['user_iduser'] =  $row['user_iduser'];

				$comments_list[] = $usercomments;
			}
			return $comments_list;	
		}
		public function showpostshares($postid){
			$resaults=mysqli_query($this->connection,"SELECT user.firstname, user.lastname,share.userid,profile.img FROM share JOIN user ON share.userid = user.iduser =profile.user_iduser WHERE share.postid = $postid ");
			while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
				$usershare['firstname'] =  $row['firstname'];
				$usershare['lastname'] =  $row['lastname'];
				$usershare['img'] =  $row['img'];
				$usershare['userid'] =  $row['userid'];

				$share_list[] = $usershare;
			}
			return $share_list;
		}
		public function viewnotification($userid){
			$resaults=mysqli_query($this->connection,"SELECT user.firstname, user.lastname,profile.img,notification.nottype FROM notification JOIN user JOIN profile ON notification.user_iduser= user.iduser = profile.user_iduser WHERE notification.user_iduserowner = $userid");
			while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
				$usernotification['firstname'] =  $row['firstname'];
				$usernotification['lastname'] =  $row['lastname'];
				$usernotification['img'] =  $row['img'];
				$usernotification['type'] =  $row['nottype'];

				$notification_list[] = $usernotification;
			}
			return $notification_list;
		}
		public function searchuser($fname){
			$resaults=mysqli_query($this->connection,"SELECT user.firstname,user.lastname,user.iduser,profile.img FROM user JOIN profile on user.iduser=profile.user_iduser where user.firstname LIKE '%$fname%' OR user.lastname LIKE '%$fname%'");
			while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
				$usersearch['firstname'] =  $row['firstname'];
				$usersearch['lastname'] =  $row['lastname'];
				$usersearch['img'] =  $row['img'];
				$usersearch['iduser'] =  $row['iduser'];

				$search_list[] = $usersearch;
			}
			return $search_list;		
		}


		public function showalllikes(){
			$resaults=mysqli_query($this->connection,"SELECT user.firstname, user.lastname,user.iduser,profile.img FROM likes JOIN user JOIN profile ON likes.userid = user.iduser = profile.user_iduser");
			while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
				$alllikes['firstname'] =  $row['firstname'];
				$alllikes['lastname'] =  $row['lastname'];
				$alllikes['id'] = $row['iduser'];
				$alllikes['img'] =  $row['img'];
				$alllikes_list[] = $alllikes;
			}
			return $alllikes_list;			
		}
		public function showallcomments(){
			$resaults=mysqli_query($this->connection,"SELECT user.firstname,user.iduser, user.lastname,profile.img FROM comment JOIN user JOIN profile ON comment.userid = user.iduser = profile.user_iduser");
			while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
				$allcomments['firstname'] =  $row['firstname'];
				$allcomments['lastname'] =  $row['lastname'];
				$allcomments['id']=$row['iduser'];
				$allcomments['img']=$row['img'];
				$allcomments_list[] = $allcomments;
			}
			return $allcomments_list;	
		}
		public function showallusers(){
			$resaults=mysqli_query($this->connection,"SELECT user.firstname,user.lastname,profile.img FROM user JOIN profile ON user.iduser=profile.user_iduser ");
			while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
				$allusers['firstname'] =  $row['firstname'];
				$allusers['lastname'] =  $row['lastname'];
				$allusers['img'] =  $row['img'];

				$allusers_list[] = $allusers;
			}
			return $allusers_list;	
		}


		public function removelike($likeid){
			mysqli_query($this->connection,"DELETE FROM likes WHERE userid=$userid AND postid=$postid");
		}

		public function removecomment($commentid){
			mysqli_query($this->connection,"DELETE FROM comment WHERE userid=$userid AND postid=$postid");
		}
		public function removepost($postid){
			mysqli_query($this->connection,"DELETE FROM post WHERE userid=$userid AND postid=$postid");
		}
		
		public function removeuser($userid){
			mysqli_query($this->connection,"DELETE FROM user WHERE userid=$userid");
		}
		public function accept_friend($userid,$friendid){
			if(mysqli_query($this->connection,"UPDATE friendlist SET status='friend' WHERE user_iduser=$userid AND user_idfriend=$friendid")){
				echo "okk";
			}
			else{
				echo "no";
			}

		}
		///////shof any better way
		public function updatesettings($username,$fname,$lname,$email,$password,$userid){
			if(mysqli_query($this->connection,"UPDATE user SET username='$username',firstname='$fname',lastname='$lname',email='$email',password='$password' WHERE iduser=$userid"))
				{return true;}
			else{
				return false;
			}
		}

		public function uploadphoto($photodir,$userid){
			mysqli_query($this->connection,"UPDATE profile SET img='$photodir' WHERE user_iduser=$userid ");
		}
		public function unfriend($userid,$friendid){
			mysqli_query($this->connection,"DELETE FROM friendlist WHERE user_iduser=$userid AND user_idfriend=$friendid");
		}
		public function unfollow($userid,$followedid){
			mysqli_query($this->connection,"DELETE FROM followerlist WHERE user_iduser=$followedid AND user_idfollow=$userid");
		}

		public function getuserprofilebyid($userid){
			$resaults= mysqli_query($this->connection,"SELECT * FROM Profile WHERE user_iduser=$userid");
			while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
				$allprofile['idprofile'] =  $row['idprofile'];
				$allprofile['user_iduser'] =  $row['user_iduser'];
				$allprofile['img'] =  $row['img'];
				$allprofile['thekey'] =  $row['thekey'];
				$allprofile['value'] =  $row['value'];

				$allprofile_list[] = $allprofile;
			}
			return $allprofile_list;		
		}

		public function showfriendrequests($userid){
			$resaults=mysqli_query($this->connection,"SELECT user.firstname,user.lastname,friendlist.user_idfriend,profile.img FROM friendlist JOIN user JOIN profile ON friendlist.user_idfriend = user.iduser = profile.user_iduser WHERE friendlist.user_iduser=$userid AND status='friendrequest'");
			while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
				$friendrequest['firstname'] =  $row['firstname'];
				$friendrequest['lastname'] =  $row['lastname'];
				$friendrequest['img'] =  $row['img'];
				$friendrequest['id'] =  $row['user_idfriend'];

				$friendrequest_list[] = $friendrequest;
			}
			return $friendrequest_list;
		}
		public function showhomeposts($userid){
			$resaults=mysqli_query($this->connection,"SELECT * FROM post where user_iduser in (SELECT user.iduser FROM friendlist JOIN user ON friendlist.user_idfriend = user.iduser WHERE friendlist.user_iduser = $userid AND friendlist.status='friend' UNION SELECT user.iduser FROM friendlist JOIN user ON friendlist.user_idfriend = user.iduser WHERE friendlist.user_idfriend = $userid AND friendlist.status='friend' UNION SELECT user.iduser FROM followerlist JOIN user ON followerlist.user_idfollow = user.iduser WHERE followerlist.user_iduser = $userid)");
			while ($row = mysqli_fetch_array($resaults, MYSQLI_ASSOC)) {
				$homeposts['postcontent'] =  $row['postcontent'];
				$homeposts['postdate'] =  $row['postdate'];
				$homeposts['idpost'] =  $row['idpost'];
				$homeposts['id'] =  $row['user_iduser'];

				$homeposts_list[] = $homeposts;
			}
			return $homeposts_list;
		}
	}
		$db=new database();
		$username="basadne";
		$fname="aa";
		$lname="bb";
		$age=11;
		$pass=123;
		$email="asdaa@bb.com";
		//$db->regNewUser($username,$email,$age,$pass,$fname,$lname);
			//$arr=$db->showalllikes();
			//foreach ($arr as $likes ) {
			//	echo $likes['firstname'];
			//}


?>