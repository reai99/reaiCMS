<?php
namespace PHPMailer;
class SendEmail
{
    public static $Host = 'smtp.qq.com'; //smtp服务器
    private static $From = '1610017000@qq.com'; //发送者的邮件地址
    private static $FromName = '热爱Blog官方邮箱'; //发送邮件的用户昵称
    private static $Username = '1610017000@qq.com'; //登录到邮箱的用户名
    private static $Password = 'dycmmmuwuiksjbfb'; //第三方登录的授权码，在邮箱里面设置

    /**
     * @desc 发送普通邮件
     * @param $title 邮件标题
     * @param $message 邮件正文
     * @param $emailAddress 邮件地址
     * @return bool|string 返回是否发送成功
     */
    public static function SendEmail($title='错误',$message='错误使用!!!',$emailAddress='1367478101@qq.com')
    {
        $mail = new PHPMailer();
        //3.设置属性，告诉我们的服务器，谁跟谁发送邮件
        $mail -> IsSMTP();			//告诉服务器使用smtp协议发送
        $mail -> SMTPAuth = true;		//开启SMTP授权
        $mail -> Host = self::$Host;	//告诉我们的服务器使用163的smtp服务器发送
        $mail -> From = self::$From;	//发送者的邮件地址
        $mail -> FromName = self::$FromName;		//发送邮件的用户昵称
        $mail -> Username = self::$Username;	//登录到邮箱的用户名
        $mail -> Password = self::$Password;	    //第三方登录的授权码，在邮箱里面设置
        //编辑发送的邮件内容
        $mail -> IsHTML(true);		    //发送的内容使用html编写
        $mail -> CharSet = 'utf-8';		//设置发送内容的编码
        $mail -> Subject = $title;//设置邮件的标题
        $mail -> MsgHTML($message);	//发送的邮件内容主体
        $mail -> AddAddress($emailAddress);    //收人的邮件地址
        //调用send方法，执行发送
        $result = $mail -> Send();
        if($result){
           return true;
        }else{
            return $mail -> ErrorInfo;
        }
    }
}