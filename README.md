# Ocean Tracking Laravel Package

Ocean Tracking 是一个轻量级的 Laravel 扩展包，用于集成外部 API 并跟踪国际海运物流状态。适用于需要追踪提单号、箱号、多段运输信息的跨境业务系统。

## 📦 安装 Installation

> 适配 Laravel 8.x 及以上版本

推荐使用本地路径方式安装：

```bash
composer require ydn/tracking
```

## ⚙️ 配置 Configuration

发布配置文件到主项目：

```bash
php artisan vendor:publish --tag=ocean-tracking-config
```

在 `config/ocean-tracking.php` 中配置：

```php
return [
    // 使用 .env 中的配置自动初始化
    'baseUrl' => env('OCEAN_TRACKING_BASE_URL', 'https://api.example.com'),
    'companyid' => env('OCEAN_TRACKING_COMPANYID','0000'),
    'secret' => env('OCEAN_TRACKING_SECRET','YOUR-SECRET'),
];
```

## 🧬 数据库迁移 Migration

执行包内迁移文件：

```bash
php artisan migrate
```

或如需发布：

```bash
php artisan vendor:publish --tag=ocean-tracking-migrations
```

## 🚀 使用方式 Usage

### 📝 示例一：注册追踪信息
```php

use Ocean\Tracking\Request\RegisterTrackingRequest;

try {
    $request = new RegisterTrackingRequest();
    $request -> setTracking('MSC','177PHYHYQXX007V'); //单个注册
    
    /* 批量注册
    $trackings = [
        [
            'carriercd' => 'CMA',
            'referenceno' => 'QGDXXXX832'
        ],[
            'carriercd' => 'MSC',
            'referenceno' => '177PHYHYQXX007V'
        ]
    ];
    $request -> setTrackings($trackings);
     */


    $res = $request -> post();
    var_dump($res -> getResults());
} catch (\Throwable $th) {
    var_dump($th -> getMessage());
}

```
### 📦 示例二：获取追踪信息

```php

use Ocean\Tracking\Request\GetTrackingRequest;
try {
    $request = new GetTrackingRequest;
    //单个获取
    $request -> getTracking('MSC','177PHYHYQXX007V');
    
    /* 批量获取
    $trackings = [
        [
            'carriercd' => 'CMA',
            'referenceno' => 'QGDXXXX832'
        ],[
            'carriercd' => 'MSC',
            'referenceno' => '177PHYHYQXX007V'
        ]
    ];
    $request -> setTrackings($trackings);
     */
    
    $res = $request -> post();
    var_dump($res -> getData());
    if($res -> hasErrors()){
        var_dump($res -> getErrorMessages());
    }
} catch (\Throwable $th) {
    var_dump($th -> getMessage());
}

```


### 🔁 示例三：自动同步追踪数据

你可以使用以下方式同步并持久化追踪数据：

```php
use Ocean\Tracking\Traits\HasTrackingFiller;

$this->updateOrCreate($apiResponse);
```

海运箱动态全量推送：

```bash
POST https://your-domin.com/api/ocean-tracking
```

传入参数（keyid 和 referenceno），会自动更新主表、航程、箱信息及状态节点。

## 📡 API 对接 API Integration

本包默认支持：

- 提单号和箱号追踪
- 多段航程 lstcarriage
- 每个箱子的完整追踪状态 lstLinertrackingStatus

你也可以通过 HTTP 客户端扩展 `OceanTracking::generateToken()` 等方法。

## 📚 License

MIT
