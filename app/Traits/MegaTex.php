<?php


namespace App\Traits;

trait MegaTex
{
    public $userId;
    public $data = [];
    public $dataDiet = [];
    public $params = [];
    public $message = '';
    public $success = false;
    public $statusCode = 200;
    private $successCode = 200;
    private $errorCode = 200;
    private $perPage = 10;
    public $error = false;

    /**
     * This is used to set user id
     */
    public function getUserId()
    {
        if (empty($this->userId)) {
            $this->userId = \Auth::user()->id;
        }
    }

    /**
     * This is used to set user id
     *
     * @param $request
     */
    public function setUserId($request)
    {
        $this->userId = $request->user()->id;
    }

    /**
     * This is used to upload image
     *
     * @param $request
     * @param $url
     * @param $obj
     */
    public function uploadImage($request, $url, $obj)
    {
        if ($request->get('image')) {
            $image = $request->get('image');
            $data = base64_decode(preg_replace('/^data:image\/\w+;base64,/i', '', $image));
            $fileName = createImageUniqueName() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            $destinationPath = $url; // user image path
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $tempFile = $destinationPath . '/' . $fileName;
            file_put_contents($tempFile, $data);
            if (!empty($obj->image)) {
                $Path = $url . $obj->image;
                if (file_exists($Path)) {
                    unlink($Path);
                }
            }
        }
    }
}
