<?php

class TestController
{

  function authorize()
  {
      if (isset($_SERVER["Authorization"]))
        return true;
      else
        return false;
  }

    /**
     * @url GET /
     * @noAuth
     */
    public function test()
    {
        return "Home method";
    }

    /**
     * @url GET /banana/
     */
    public function banana()
    {
        return "banana";
    }

    /**
     * @url GET /login/$id
     * @url POST /login
     */
    public function login($id)
    {
      if($id)
        return array("success" => 'Logged in : ZYX' . ' Id :' . $id);
      else
        return "New User";
    }

    /**
     * @url GET /users/$id
     * @url GET /users/current
     */
    public function getUser($id = null)
    {
        return array("id" => $id, "name" => null);
    }
}

?>
