# redis
Redis是`Remote Dictionary Server`(远程数据服务)的缩写，
由意大利人 `antirez`(Salvatore Sanfilippo)  开发的一款 内存高速缓存数据库。
该软件使用C语言编写,它的数据模型为` key-value`。
它支持丰富的数据结构，比如 `String`（字符串）`list`（双向链表）  `hash`（哈希） `set`（集合） `sorted set`（有序集合）。数据可持久化（定时写入磁盘中），保证了数据安全。

## 使用场景

①[Sort Set]`排行榜`应用，取top n操作，例如sina微博热门话题<br>
②[List]获得最新N个数据 或 某个分类的最新数据<br>
③[string]计数器应用 `incr`  <br>
④[Set]`sns`(social network site)获得共同好友<br>
⑤[Set]防攻击系统(ip判断)，黑白名单等等<br>

## 对比memcache

①Redis不仅仅支持简单的`k/v`类型的数据，同时还提供`list`，`set`，`zset`，`hash`等数据结构的存储。<br>
②Redis支持`master-slave`(主—从)模式应用。<br>
③Redis支持数据的持久化，可以将内存中的数据保持在磁盘中，重启的时候可以再次加载进行使用。<br>
④Redis单个`value`的最大限制是`1GB`， memcached只能保存`1MB`的数据。<br>
