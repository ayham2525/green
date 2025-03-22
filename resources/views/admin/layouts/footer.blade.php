
</div>
<div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
  <div class="modal-dialog mt-6" role="document">
    <div class="modal-content border-0">
      <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
        <div class="position-relative z-index-1 light">
          <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
          <p class="fs--1 mb-0 text-white">Please create your free Falcon account</p>
        </div><button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-4 px-5">
        <form>
          <div class="mb-3"><label class="form-label" for="modal-auth-name">Name</label><input class="form-control" type="text" autocomplete="on" id="modal-auth-name" /></div>
          <div class="mb-3"><label class="form-label" for="modal-auth-email">Email address</label><input class="form-control" type="email" autocomplete="on" id="modal-auth-email" /></div>
          <div class="row gx-2">
            <div class="mb-3 col-sm-6"><label class="form-label" for="modal-auth-password">Password</label><input class="form-control" type="password" autocomplete="on" id="modal-auth-password" /></div>
            <div class="mb-3 col-sm-6"><label class="form-label" for="modal-auth-confirm-password">Confirm Password</label><input class="form-control" type="password" autocomplete="on" id="modal-auth-confirm-password" /></div>
          </div>
          <div class="form-check"><input class="form-check-input" type="checkbox" id="modal-auth-register-checkbox" /><label class="form-label" for="modal-auth-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label></div>
          <div class="mb-3"><button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Register</button></div>
        </form>
        <div class="position-relative mt-5">
          <hr />
          <div class="divider-content-center">or register with</div>
        </div>
        <div class="row g-2 mt-2">
          <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
          <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
 

 
<script src="{{ url('vendors') }}/popper/popper.min.js"></script>
<script src="{{ url('vendors') }}/bootstrap/bootstrap.min.js"></script>
<script src="{{ url('vendors') }}/anchorjs/anchor.min.js"></script>
<script src="{{ url('vendors') }}/is/is.min.js"></script>
<script src="{{ url('vendors') }}/echarts/echarts.min.js"></script>
<script src="{{ url('vendors') }}/fontawesome/all.min.js"></script>
<script src="{{ url('vendors') }}/lodash/lodash.min.js"></script>
<script src="{{ url('assets') }}/polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>
<script src="{{ url('vendors') }}/list.js/list.min.js"></script>
<script src="{{ url('assets') }}/js/theme.js"></script>
<script src="{{ url('vendors') }}/chart/chart.min.js"></script>
<script src="{{ url('vendors') }}/countup/countUp.umd.js"></script>
<script src="{{ url('vendors') }}/dayjs/dayjs.min.js"></script>



 <script src="{{ url('assets') }}/assets/js/flatpickr.js"></script>
<script src="{{ url('vendors') }}/dropzone/dropzone.min.js"></script>
<script src="{{ url('vendors') }}/lottie/lottie.min.js"></script>
<script src="{{ url('vendors') }}/validator/validator.min.js"></script>
<script src="{{ url('vendors') }}/prism/prism.js"></script>


<script src="{{ url('vendors') }}/jquery/jquery.min.js"></script>
  

 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
 
 



<!-- Code injected by live-server -->
<script>
// <![CDATA[  <-- For SVG support
if ('WebSocket' in window) {
(function () {
    function refreshCSS() {
        var sheets = [].slice.call(document.getElementsByTagName("link"));
        var head = document.getElementsByTagName("head")[0];
        for (var i = 0; i < sheets.length; ++i) {
            var elem = sheets[i];
            var parent = elem.parentElement || head;
            parent.removeChild(elem);
            var rel = elem.rel;
            if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
            }
            parent.appendChild(elem);
        }
    }
    var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
    var address = protocol + window.location.host + window.location.pathname + '/ws';
    var socket = new WebSocket(address);
    socket.onmessage = function (msg) {
        if (msg.data == 'reload') window.location.reload();
        else if (msg.data == 'refreshcss') refreshCSS();
    };
    if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
        console.log('Live reload enabled.');
        sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
    }
})();
}
else {
console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
}
// ]]>
</script>
</body>


</html> 