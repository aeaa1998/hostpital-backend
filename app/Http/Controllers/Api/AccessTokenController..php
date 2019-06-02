<?php
namespace App\Http\Controllers\Api;

use App\Http\Resources\TokenResource;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;
use League\OAuth2\Server\Exception\OAuthServerException;
use Psr\Http\Message\ServerRequestInterface;
use Response;
use \Laravel\Passport\Http\Controllers\AccessTokenController as ATC;

class AccessTokenController extends ATC {
	public function issueToken(ServerRequestInterface $request) {
		try {
			//get username (default is :email)
			$username = $request->getParsedBody()['username'];

			//get user
			//change to 'email' if you want
			$user = User::where('email', $username)->with(['doctor', 'patient'])->first();

			//generate token
			$tokenResponse = parent::issueToken($request);

			//convert response to json string
			$content = $tokenResponse->getContent();

			//convert json to array
			$data = json_decode($content, true);
			if (isset($data["error"])) {
				throw new OAuthServerException('The user credentials were incorrect.', 6, 'invalid_credentials', 401);
			}

			//add access token to user
			if ($user->doctor !== null) {
				Session::put('is_doctor', 1);
			}
			// $user = collect($user);
			$user->access_token = $data['access_token'];
			// $user->put('access_token', $data['access_token']);
			return response()->json(new TokenResource($user));
		} catch (ModelNotFoundException $e) {
			// email notfound
			//return error message
			return response(["message" => "User not found"], 500);
		} catch (OAuthServerException $e) {
			//password not correct..token not granted
			//return error message
			return response(["message" => "The user credentials were incorrect.', 6, 'invalid_credentials"], 500);
		} catch (Exception $e) {
			////return error message
			dd($e);
			return response(["message" => "Internal server error"], 500);
		}
	}
}