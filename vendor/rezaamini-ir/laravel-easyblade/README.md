[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/rezaamini-ir/laravel-easyblade/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/rezaamini-ir/laravel-easyblade/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/rezaamini-ir/laravel-easyblade/badges/build.png?b=master)](https://scrutinizer-ci.com/g/rezaamini-ir/laravel-easyblade/build-status/master)

# laravel EasyBlade

You can create a simpler and readable view with EasyBlade

# Install

```
composer require rezaamini-ir/laravel-easyblade
```

# Usage

Use EasyBlade is too much easy like its name.

Imagine you want to write a route URL in a href in Blade
You can write this code : 
```html
    <a href="{{ route('home') }}"></a>
```
But We create a easier way with EasyBlade 
Just write :
```html
    <a href="@route('home')"></a>
```
and don't use any {{ }} in your blade or don't use any PHP pure code

Blade template engine has created to not code PHP pure, It has created to code easier. You can pass it by EasyBlade

## Current Directives :

- `@asset('foo')`
- `@url('foo')`
- `@route('foo')`
- `@isActive('routeName', 'active', 'deactive')`
- `@count(array|collection, number )`
- `@user(attr)`
- `@sessionExists('name')`
- `@session('name')`
- `@image('address', 'cssClasses')`
- `@style('style.css')`
- `@script('script.js')`
- `@config('app.name', 'Laravel')`
- `@old('name', 'Reza')`

## Features :
 - You can pass a route name or array of route names as first parameters to```@isActive``` directive , second parameter is a string which you want to echo in view and third parameter is a optional param and it will return a null string if nothing passed , It will be showed when current route is not equal to array or string which passed as first param
 - You can use `@count` directive instead of write lots of if to check count of collection or array is equal or greater than your number which passed to second param.
 
## Examples : 
- `@count`
```blade
    @count([1, 2, 3], 3)
        something
    @endcount
    // return `something` because count of array is equal 3
```

```blade
    @count([1, 2], 3)
        true
    @endcount
    // return null because count of array is smaler than 3
```

- `@isActive` Imagine current route is : `dashboard.home`
```blade
    @isActive('dashboard.home', 'active', 'deactive')
    // Return : active
```
```blade
    @isActive(['dashboard.home', 'dahboard.profile'], 'active', 'deactive')
    // Return : active
```
```blade
    @isActive('home', 'active', 'deactive')
    // Return : deactive
```

- `@asset` 
```blade
    @asset('img/header.png')
    
    // Return : http://127.0.0.1/img/header.png (Like asset() helper )
```
- `@route` 
```blade
    @route('dashboard')
    
    // Return : http://127.0.0.1/dashboard (Like route('routeName') helper )
```

- `@url` 
```blade
    @url('/home')
    
    // Return : http://127.0.0.1/home (Like url('address') helper )
```

- `@user` 
```blade
    @user('name')
    
   // It will run auth()->user()->name and return user's name
   // You don't need to check user is authenticated or not , it will check by itself

```
- `@sessionExists`

```blade
    @sessionExists('foo')
        Session Exists
    @endsessionExists
    
    // It will run session()->exists('foo') in a condition
```

- `@session`

```blade
    @session('name')
    
    // First it will check session exists then it will print value of session 
```

- `@image`

```blade
    @image('img/img1.png', 'img-fuild rounded-circle')
    
    // Return a img tag with http://domain/img/img1.png file and 'img-fuild rounded-circle' class
```

- `@old`
```blade
    @old('name', $user->name)
    
    // Return something like : {{ old('name', $user->name) }}
```

- `@script`
```blade
    @script('/js/script.js')
    // Return script tag : <script src="/js/script.js"></script>
      
    @script('/js/script.js', true) // Second and third parameter is optional
    // Return script tag with defer : <script src="/js/script.js" defer></script>  
```

- `@style`
```blade
    @style('/css/app.css')
    // Return link tag : <link rel="stylesheet" href="/css/app.css">
```