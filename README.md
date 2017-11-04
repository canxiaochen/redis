# redis实现的简单秒杀系统
Redis是`Remote Dictionary Server`(远程数据服务)的缩写，
由意大利人 `antirez`(Salvatore Sanfilippo)  开发的一款 内存高速缓存数据库。
该软件使用C语言编写,它的数据模型为` key-value`。
它支持丰富的数据结构，比如 `String`（字符串）`list`（双向链表）  `hash`（哈希） `set`（集合） `sorted set`（有序集合）。数据可持久化（定时写入磁盘中），保证了数据安全。详细见[redis官网](https://redis.io/) 。

## redis使用场景

* [Sort Set]`排行榜`应用，取top n操作，例如sina微博热门话题<br>
* [List]获得最新N个数据 或 某个分类的最新数据<br>
* [string]计数器应用 `incr`  <br>
* [Set]`sns`(social network site)获得共同好友<br>
* [Set]防攻击系统(ip判断)，黑白名单等等<br>
## 本秒杀系统运行环境
* php5.6 + phpredis扩展
* redis服务
* apache2
* mysql：table 商品表(goods) + 订单表（order）

## 工作流程
1. 基于goods表中的库存，创建redis商品库存队列
2. 客户端访问秒杀API
3. **先从redis的商品库存队列中查询剩余库存**
4. redis队列中有剩余，则在mysql中创建订单，去库存，抢购成功
5. redis队列中没有剩余，则提示库存不足，抢购失败

## 对比memcache

* Redis不仅仅支持简单的`k/v`类型的数据，同时还提供`list`，`set`，`zset`，`hash`等数据结构的存储。<br>
* Redis支持`master-slave`(主—从)模式应用。<br>
* Redis支持数据的持久化，可以将内存中的数据保持在磁盘中，重启的时候可以再次加载进行使用。<br>
* Redis单个`value`的最大限制是`1GB`， memcached只能保存`1MB`的数据。<br>

## 数据持久化
* `snappshoting`默认方式
  * 备份频率
    * save `900 1` 15分钟至少1个key改变
    * save `300 10` 5分钟至少10个key改变
    * save `60 10000` 1分钟至少10000个key改变
* `append only file`（aof）
  * 备份频率
    * appendfsync `everysec` 每秒强制写入磁盘一次 默认
    * appendfsync `always` 每次写命令写入磁盘一次
    * appendfsync `no` 完全依赖os，性能最好，持久化没保证
