<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Repositories\PermissionRepository as Permission;

class AuthorizeMiddleware {

	public function __construct(Guard $auth, Permission $permission)
	{
		$this->auth = $auth;
		$this->permission = $permission;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->check()){
			$user = $this->auth->user();
			$permissions = $this->permission->all();

			$uri = explode('/',$request->path())[0];

			foreach($permissions as $permission)
			{
				if( ! $user->can($permission->name) && $permission->route == $uri)
				{
					if ($request->ajax())
					{
						return response('Unauthorized.', 401);
					}
					else
					{
						return redirect('401');
					}
				}
			}
		}else{
			return redirect('login');
		}

		return $next($request);
	}

}
