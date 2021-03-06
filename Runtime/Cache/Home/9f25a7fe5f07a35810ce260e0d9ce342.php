<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <!-- 公共描述 start public/head -->
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta http-equiv="Cache-Control" content="no-transform">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no,address=no,email=no">
<base target="_blank">
<!-- 公共描述 end -->
<!-- 公共样式 start -->
<script src="/Public/static/assets/lodash.js?t=1511228427927"></script>
<script src="/Public/static/assets/i18next.min.js?t=1511228427927"></script>
<script src="/Public/static/assets/modernizr.min.js?t=1511228427927"></script>
<script src="/Public/static/assets/template-web.js?t=1511228427927"></script>
<script src="/Public/static/assets/micro-storage.min.js?t=1511228427927"></script>
<link rel="stylesheet" href="/Public/static/assets/swiper.min.css?t=1511228427927">
<link rel="stylesheet" href="/Public/static/css/main.css?t=1511228427927">
<!-- 公共样式 end -->

        <title><?php echo C('WEB_SITE_TITLE');?></title>
        <meta name="keywords" content="keywords">
        <meta name="description" content="description">
    </head>
    <body>
        <script>
(function () {
    var store = microStorage('HEAVYRAIN');
    var lang = store('language');
    window.$lang = lang ? lang : /zh/i.test(navigator.language) ? 'cn' : 'en';
    store('language', window.$lang);
})();
</script>

<script>window.$debug = true</script>
<script>document.body.classList.add('lang-' + window.$lang)</script>

        <div class="g-layout speaker-list">
                <!-- 顶栏 start public/topbar -->
<div class="g-topbar" tpl="topbar"></div>
<script id="tpl-topbar" type="text/html">
    <nav class="topbar">
        <div class="g-center">
            <div class="topbar-logo">
                <a href="/">
                    <h1>HEAVYRAIN | SPEAKERS™</h1>
                </a>
            </div>
            <div class="topbar-menu">
                <select name="language" id="language">
                    <option value="en" {{ lang == 'en' ? 'selected' : '' }}>EN</option>
                    <option value="cn" {{ lang == 'cn' ? 'selected' : '' }}>CN</option>
                </select>
                <ul>
                    {{each buttons}}
                        <li>
                            <a href="{{ $value.link }}">
                                <span>{{ $value.text }}</span>
                            </a>
                        </li>
                    {{/each}}
                </ul>
            </div>
        </div>
    </nav>
</script>
<script>
    i18next.init({
        lng: window.$lang,
        debug: window.$debug,
        returnObjects: true,
        resources: {
            en: {
                topbar: {
                    buttons: [
                        'OUR SPEAKERS',
                        'ADVISORY SERVICES',
                        'CASE',
                        'NEWS',
                        'ABOUT US',
                        'EN',
                    ],
                },
            },
            cn: {
                topbar: {
                    buttons: [
                        '演讲嘉宾',
                        '服务分类',
                        '成功案例',
                        '新闻',
                        '关于我们',
                        'CN',
                    ],
                },
            },
        },
    }, function ( err, t ) {
        var links = [
        '/index.php?s=/Home/Article/lists/category/speakers.html', // 演讲嘉宾
        '/index.php?s=/Home/Article/lists/category/advisoryservices.html', // 服务分类
        '/index.php?s=/Home/Article/lists/category/case.html', // 成功案例
        '/index.php?s=/Home/Article/lists/category/news.html', // 新闻
        '/index.php?s=/Home/index/about.html', // 关于我们
            '#',
        ];
        document.querySelector('[tpl="topbar"]').innerHTML = template('tpl-topbar', {
            buttons: _.map(t('topbar:buttons'), function ( text, index ) {
                var link = links[index];
                return {
                    text : text,
                    link : link,
                };
            }),
            lang: window.$lang,
        });

        document.querySelector('.topbar .topbar-menu ul li:last-child a').addEventListener('click', function ( event ) {
            event.preventDefault();
        }, false);
    });
    document.querySelector('#language').addEventListener('change', function () {
        if (this.value === window.$lang) {
            return;
        }
        var store = microStorage('HEAVYRAIN');
        store('language', this.value);
        window.location.reload();
    }, false);
</script>
<!-- 顶栏 end -->

            <div class="g-body">
                <!-- 背景 start public/banner -->
<div class="g-banner is-ceil"></div>
<div class="g-banner is-floor"></div>
<!-- 背景 end -->

                <div class="g-center">
                    <!-- 嘉宾列表 start -->
                    <div class="g-container" tpl="main"></div>
                    <script id="tpl-main" type="text/html">
                        <h2 class="speaker-list__title">{{ title }}</h2>
                        <div class="speaker-list__cover"><em></em></div>
                        <div class="speaker-list__list">
                            <ul>
								<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><!-- 单个嘉宾 start item/speaker-item -->
								<li>
									<a href="<?php echo U('Article/detail?id='.$data['id']);?>">
										<div class="speaker-list__item">
											<div class="speaker-list__avatar">
												<img src="<?php echo get_sc($data['cover_id'],'360','360');?>" alt="<?php echo ($data["title"]); ?>" width="360" height="360">
											</div>
											<div class="speaker-list__popup">
												<h4><?php echo ($data["title"]); ?></h4>
												<p>世界银行首席经济学家</p>
												<i>详情</i>
											</div>
										</div>
									</a>
								</li>
								<!-- 单个嘉宾 end --><?php endforeach; endif; else: echo "" ;endif; ?>   
                            </ul>
                        </div>
                    </script>
                    <script>
                        i18next.init({
                            lng: window.$lang,
                            debug: window.$debug,
                            returnObjects: true,
                            resources: {
                                en: {
                                    main: {
                                        title: 'SPEAKERS',
                                    },
                                },
                                cn: {
                                    main: {
                                        title: '演讲嘉宾',
                                    },
                                },
                            },
                        }, function ( err, t ) {
                            document.querySelector('[tpl="main"]').innerHTML = template('tpl-main', {
                                title: t('main:title'),
                            });
                        });
                    </script>
                    <!-- 嘉宾列表 end -->
                </div>
            </div>
            <!-- 页脚 start public/footer -->
<div class="g-footer" tpl="footer"></div>
<script id="tpl-footer" type="text/html">
    <footer class="footer">
        <div class="footer-contact">
            <div class="g-center">
                <h3>{{ title }}</h3>
                <p>{{@ desc }}</p>
                <a href="#">{{ button }}</a>
            </div>
        </div>
        <div class="footer-copyright">© 2017 HeavyRain Inc</div>
    </footer>
</script>
<script>
    i18next.init({
        lng: window.$lang,
        debug: window.$debug,
        resources: {
            en: {
                footer: {
                    title: 'About Us',
                    desc: 'Listen, learn, and change. Heavyrain, connect to the great minds.<br>International Speakers Provider<br>Planning and coordinating conferences<br>International resources exchanging and cooperating<br>Let\'s make a change!',
                    button: 'CONTACT US',
                },
            },
            cn: {
                footer: {
                    title: '关于我们',
                    desc: '暴雨倾盆——慢听风吹雨声声，入耳观心<br>国际演讲嘉宾经纪服务<br>策划及统筹国际级会议<br>国际交流合作资源对接<br>思想触发改变!',
                    button: '联系我们',
                },
            },
        },
    }, function ( err, t ) {
        document.querySelector('[tpl="footer"]').innerHTML = template('tpl-footer', {
            title: t('footer:title'),
            desc: t('footer:desc'),
            button: t('footer:button'),
        });
    });
</script>
<!-- 页脚 end -->
<!-- 公共脚本 start -->
<script src="/Public/static/assets/axios.min.js?t=1511228427927"></script>
<script src="/Public/static/assets/swiper.min.js?t=1511228427927"></script>
<script src="/Public/static/js/main.js?t=1511228427927"></script>
<!-- 公共脚本 end -->

        </div>
    </body>
</html>