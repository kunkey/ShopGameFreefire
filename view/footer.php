
            </div>
        </div>
        <!-- END: PAGE CONTENT -->
    </div>

<div id="modal_bigin"></div>

    <script>
        $(document).ready(function () {

            $(".int").inputmask("integer", { radixPoint: ",", autoGroup: true, groupSeparator: ".", groupSize: 3 });
            $(".dec").inputmask("decimal", { radixPoint: ",", autoGroup: true, groupSeparator: ".", groupSize: 3 });

            function detectmob() {
                if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
                    return true;
                } else { return false; }
            }
            var t = { delay: 125, overlay: $(".fb-overlay"), widget: $(".fb-widget"), button: $(".fb-button") };
            setTimeout(function () { $("div.fb-livechat").fadeIn() }, 8 * t.delay);
            if (!detectmob()) {
                $(".ctrlq").on("click", function (e) { e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({ bottom: 0, opacity: 0 }, 2 * t.delay, function () { $(this).hide("slow"), t.button.show() })) : t.button.fadeOut("medium", function () { t.widget.stop().show().animate({ bottom: "30px", opacity: 1 }, 2 * t.delay), t.overlay.fadeIn(t.delay) }) })
            }


        });

        function reload_money() {
                              $.ajax({ 
                        type: 'post', 
                        dataType: "JSON",
                        url: '/system/user', 
                        data: {
                            type: 'get-money',
                            token: '<?php if(isset($_SESSION['token'])) echo $_SESSION['token'];?>'
                        }, 
                        success: function (json) {
                            if(json.status == false) {
                     swal("Lỗi!", "Vui lòng đăng nhập lại!", "error");          
                            }else if(json.status == true) {
                            $("#head_money").numAnim({
                                endAt: json.money,
                                duration: 3
                            });
                              return json.money;
                            }else {
                     swal("Lỗi!", "Lỗi hệ thống!", "error");                
                            }
                    }
                });

        }


(function($){
    $.fn.extend({
        numAnim: function(options) {
            if ( ! this.length)
                return false;

            this.defaults = {
                endAt: 2560,
                numClass: 'autogen-num',
                duration: 5,   // seconds
                interval: 90  // ms
            };
            var settings = $.extend({}, this.defaults, options);

            var $num = $('<span/>', {
                'class': settings.numClass 
            });

            return this.each(function() {
                var $this = $(this);

                // Wrap each number in a tag.
                var frag = document.createDocumentFragment(),
                    numLen = settings.endAt.toString().length;
                for (x = 0; x < numLen; x++) {
                    var rand_num = Math.floor( Math.random() * 10 );
                    frag.appendChild( $num.clone().text(rand_num)[0] )
                }
                $this.empty().append(frag);

                var get_next_num = function(num) {
                    ++num;
                    if (num > 9) return 0;
                    return num;
                };

                // Iterate each number.
                $this.find('.' + settings.numClass).each(function() {
                    var $num = $(this),
                        num = parseInt( $num.text() );

                    var interval = setInterval( function() {
                        num = get_next_num(num);
                        $num.text(num);
                    }, settings.interval);

                    setTimeout( function() {
                        clearInterval(interval);
                    }, settings.duration * 1000 - settings.interval);
                });

                setTimeout( function() {
                    $this.text( settings.endAt.toString() );
                }, settings.duration * 1000);
            });
        }
    });
})(jQuery);

    </script>



        <script>

            $(document).ready(function(){
                if ($.cookie('noticeModal') != '1') {
					
					$("#modal_bigin").load("/view/modal.php");
                    //show popup here

                    var date = new Date();
                    var minutes = 60*12;
                    date.setTime(date.getTime() + (minutes * 60 * 1000));
                    $.cookie('noticeModal', '1', { expires: date}); }
            });
        </script>



<footer class="c-layout-footer c-layout-footer-3 c-bg-dark" style="background: linear-gradient(rgb(0 0 0 / 14%), hsl(0deg 0% 0%)),url(/images/section-bg.jpg) no-repeat center top;
    background-attachment: fixed;
    background-size: cover;">
<div class="c-prefooter">
<div class="container">
<div class="row">

<div class="col-md-4">
<div class="c-container c-first">

<!-- END: PAGE CONTENT -->

<div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
		<div class="modal-content">
			&lt;p style=&quot;text-align:center&quot;&gt;&lt;span style=&quot;font-size:14px&quot;&gt;&lt;span style=&quot;color:#f39c12&quot;&gt;&lt;strong&gt;CH&amp;Agrave;O MỌI NGƯỜI ĐẾN VỚI SHOP NICK FREE FIRE CỦA GARENA FREE FIRE&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;

&lt;p style=&quot;text-align:center&quot;&gt;&lt;span style=&quot;font-size:14px&quot;&gt;&lt;span style=&quot;color:#f39c12&quot;&gt;&lt;strong&gt;M&amp;Igrave;NH CHỈ C&amp;Oacute; DUY NHẤT 1 <?php echo $_title['name'];?>&amp;nbsp;NH&amp;Eacute;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;

&lt;p style=&quot;text-align:center&quot;&gt;&lt;strong&gt;&lt;em&gt;&lt;u&gt;&lt;a href=&quot;https://www.facebook.com/&quot;&gt;&lt;span style=&quot;color:#8e44ad&quot;&gt;FACEBOOK ADMIN HỖ TRỢ&lt;/span&gt;&lt;/a&gt;&lt;/u&gt;&lt;/em&gt;&lt;/strong&gt;&lt;a href=&quot;https://www.facebook.com/&quot;&gt;&lt;span style=&quot;color:#8e44ad&quot;&gt;&lt;strong&gt;&lt;em&gt;&lt;u&gt;&amp;nbsp;TẠI D&amp;Acirc;Y&lt;/u&gt;&lt;/em&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/a&gt;&lt;/p&gt;

&lt;p style=&quot;text-align:center&quot;&gt;&lt;span style=&quot;font-size:18px&quot;&gt;&lt;span style=&quot;color:#c0392b&quot;&gt;&lt;strong&gt;SHOP KH&amp;Ocirc;NG MUA NICK VUI L&amp;Ograve;NG KH&amp;Ocirc;NG&amp;nbsp;NHẮN TIN&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;

&lt;p style=&quot;text-align:center&quot;&gt;&amp;nbsp;&lt;/p&gt;

&lt;p style=&quot;text-align:center&quot;&gt;&amp;nbsp;&lt;/p&gt;
		</div>
	</div>
	</div>
</div>

<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
		<div class="modal-content">
		</div>
	</div>
</div>


<script>
    $(document).ready(function () {
        $('.load-modal').each(function (index, elem) {
            $(elem).unbind().click(function (e) {
                e.preventDefault();
                e.preventDefault();
                var curModal = $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
    });
</script>



<!-- END: PAGE CONTAINER -->
<div class="clearfix"></div>
<div class="sl-footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <p><center><img src="https://i.imgur.com/yYKxvqY.png" style="max-width:100%"></center></p><Br/>
            </div> 
			<div class="col-xs-12 col-sm-12 col-md-6">
                <p><strong>HỆ THỐNG <?php echo $_title['name'];?> B&Aacute;N ACC , THỬ VẬN MAY FREE FIRE&nbsp;TỰ ĐỘNG - ĐẢM BẢO UY T&Iacute;N V&Agrave; CHẤT LƯỢNG.</strong></p>
                <p><strong>Thời gian làm việc: 7h-24h các ngày trong tuần</strong></p>
                <hr/>
				<p><strong>© 2020 - Copyright <?php echo $_title['name'];?></strong></p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <p><strong>CH&Uacute;NG T&Ocirc;I LU&Ocirc;N LẤY UY T&Iacute;N L&Agrave;M H&Agrave;NG ĐẦU ĐỐI VỚI KH&Aacute;CH H&Agrave;NG. HI VỌNG SẼ ĐƯỢC PHỤC VỤ C&Aacute;C BẠN. CẢM ƠN!</strong></p>
                <hr/>
				<p><strong>
					<i class="fa fa-history"></i> Giao Dịch Thành Công: <font color="orange">+19,532</font> Giao Dịch
				</strong></p>
				<p><strong>
					<i class="fa fa-users"></i> Tổng: <font color="orange">+14,234</font> Thành Viên
				</strong></p>

            </div>

        </div>
          
    </div>
</div>







<div class="c-postfooter" style="margin-top: -50px">
<div class="container">
<div class="row">
<div class="col-md-6 col-sm-12 c-col">

<span class="c-font-grey-3"> </span>
</div>
</div>
</div>
</div>
</footer>


<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v8.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="117923940040406"
  theme_color="#0084ff"
  logged_in_greeting="Chào Bạn! ShopMaThuat.Com  Có thể giúp gì cho bạn ạ?"
  logged_out_greeting="Chào Bạn! ShopMaThuat.Com  Có thể giúp gì cho bạn ạ?">
      </div>



<canvas id="canvas"></canvas>
</body>

</html>