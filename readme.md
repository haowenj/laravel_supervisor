### 一、安装supervisor
````
apt-get install supervisor
````

### 二、启动supervisor
````
/etc/init.d/supervisor start
````

### 三、新建运行laravel队列的配置文件
配置文件的位置在`/etc/supervisor/conf.d`,配置文件以`.conf`结尾，文件名和`program：`后面的一致
````
[program:laravel-worker-default]
process_name=laravel-worker-default
command=php /var/www/html/supervisor/artisan queue:work
autostart=true
autorestart=true
user=root
numprocs=1
redirect_stderr=true
stdout_logfile=/var/log/supervisor/laravel-queue-default.log
````
### 四、重载配置文件
supervisor有supervisord和supervisorctl两种命令类型，supervisord是服务相关的命令，supervisorctl是客户端相关的命令
````
supervisorctl reload
````

### 五、常用命令
````
supervisorctl status //查看进程状态
supervisorctl stop laravel-worker-default //停止一个进程
supervisorctl stop all //停止所有进程
supervisorctl reload //根据新的配置文件重新启动所有进程
supervisorctl update //更新配置文件的进程被重启，没改动的不会重启
````