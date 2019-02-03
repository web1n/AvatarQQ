<?php
/**
 * 头像替换为QQ头像
 *
 * @package AvatarQQ
 * @author web1n
 * @version 1.0
 * @link https://https.vc
 */
class AvatarQQ implements Typecho_Plugin_Interface {
  
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate() {
        Typecho_Plugin::factory('Widget_Abstract_Comments')->gravatar = array(
            'AvatarQQ',
            'getAvatar'
        );
    }
  
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate() {
      
    }
    
    /**
     * 获取插件配置面板
     *
     * @static
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){
      
    }

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form) {
      
    }
  
    /**
     * 插件实现方法
     *
     * @param $size
     * @param $rating
     * @param $default
     * @param $comments
     */
    public static function getAvatar($size, $rating, $default, $comments) {
        $url;
        if (strrpos($comments->mail, "@qq.com")) {
            $qqnum = str_replace("@qq.com", "", $comments->mail);
            $url = '//q.qlogo.cn/g?b=qq&nk=' . $qqnum . '&refer=web1n&s=100';
        }else{
       $url = Typecho_Common::gravatarUrl($comments->mail, $size, $rating, $default, $comments->request->isSecure());
          }
        
       echo '<img class="avatar" src="' . $url . '" alt="' .
                $comments->author . '" width="' . $size . '" height="' . $size . '" />';
      }
}

