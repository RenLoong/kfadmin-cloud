<?php
namespace YcOpen\CloudService\Request;

use YcOpen\CloudService\Request;
use YcOpen\CloudService\Validator;

/**
 * 小程序相关接口
 * Class MiniprojectRequest
 * @package YcOpen\CloudService\Request
 */
class MiniprojectRequest extends Request
{
    /**
     * 上传小程序或者密钥
     * action proejct：小程序包，privatekey：上传密钥
     * file 文件
     * @return MiniprojectRequest
     */
    public function upload()
    {
        $this->setUrl('Miniproject/upload');
        $this->setMethod('POST');
        $validator=new Validator;
        $validator->rules([
            'action'=>'required',
            'file'=>'required',
        ]);
        $this->validator=$validator;
        return $this;
    }
    /**
     * 创建小程序包
     * name 应用标识
     * path 小程序包路径
     * version 版本号
     * desc 描述
     * type wxmp:小程序平台
     * @return MiniprojectRequest
     */
    public function createProejct()
    {
        $this->setUrl('Miniproject/createProejct');
        $this->setMethod('POST');
        $validator=new Validator;
        $validator->rules([
            'name'=>'required',
            'path'=>'required',
            'version'=>'required',
            'desc'=>'required',
            'type'=>'required',
        ]);
        $this->validator=$validator;
        return $this;
    }
    /**
     * 小程序上传设置
     * appid 小程序appid
     * privatekey 密钥文件路径
     * type wxmp:小程序平台
     * @return MiniprojectRequest
     */
    public function setConfig()
    {
        $this->setUrl('Miniproject/setConfig');
        $validator=new Validator;
        $validator->rules([
            'appid'=>'required',
            'privatekey'=>'required',
            'type'=>'required'
        ]);
        $this->validator=$validator;
        return $this;
    }
    /**
     * 获取token
     * appid 小程序appid
     * name 应用标识
     * preview_desc 小程序预览描述，不传则不生成预览二维码
     * type wxmp:小程序平台
     * @return MiniprojectRequest
     */
    public function getUploadToken()
    {
        $this->setUrl('Miniproject/getUploadToken');
        $validator=new Validator;
        $validator->rules([
            'appid'=>'required',
            'name'=>'required',
            'type'=>'required'
        ]);
        $this->validator=$validator;
        return $this;
    }
    /**
     * 上传小程序包
     * token 上传token
     * @return MiniprojectRequest
     */
    public function miniprojectUpload()
    {
        $this->setBaseUrl('http://wxmp-upload.kf.kaifa.cc/');
        $this->setUrl('upload/index');
        $validator=new Validator;
        $validator->rules([
            'token'=>'required'
        ]);
        $this->validator=$validator;
        return $this;
    }
    /**
     * 预览小程序包
     * token 上传token
     * @return MiniprojectRequest
     */
    public function miniprojectPreview()
    {
        $this->setBaseUrl('http://wxmp-upload.kf.kaifa.cc/');
        $this->setUrl('upload/preview');
        $validator=new Validator;
        $validator->rules([
            'token'=>'required'
        ]);
        $this->validator=$validator;
        return $this;
    }
    /**
     * 预览小程序包二维码
     * appid 小程序appid
     * name 应用标识
     * @return MiniprojectRequest
     */
    public function miniprojectPreviewQrcode()
    {
        $this->setBaseUrl('http://wxmp-upload.kf.kaifa.cc/');
        $this->setUrl('preview/index');
        $validator=new Validator;
        $validator->rules([
            'appid'=>'required',
            'name'=>'required',
        ]);
        $this->validator=$validator;
        return $this;
    }
}