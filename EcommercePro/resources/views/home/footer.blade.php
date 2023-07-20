<footer>
    <div class="container">
       <div class="row">
          <div class="col-md-4">
              <div class="full">
                 <div class="logo_footer">
                   <a href="#"><img width="210" src="/images/logo.png" alt="#" /></a>
                 </div>
                 <div class="information_f">
                   <p><strong>ADRES:</strong> Mehmet Akif Mahallesi, Ak Sokak Sultanbeyli İstanbul, Türkiye</p>
                   <p><strong>TELEFON:</strong> +90 534 635 5893</p>
                   <p><strong>EMAIL:</strong> MeriLass@gmail.com</p>
                 </div>
              </div>
          </div>
          <div class="col-md-8">
             <div class="row">
             <div class="col-md-7">
                <div class="row">
                   <div class="col-md-6">
                <div class="widget_menu">
                   <h3>Menü</h3>
                   <ul>
                      <li><a href="{{url('/')}}">Ana Sayfa</a></li>
                      <li><a href="{{ url('show_us') }}">Hakkında</a></li>
                      <li><a href="{{url('products')}}">Ürünler</a></li>
                      <li><a href="{{ url('show_client') }}">Blog</a></li>
                      <li><a href="{{ url('show_cart') }}">Sepet</a></li>
                      <li><a href="{{ url('show_order') }}">Siparişler</a></li>
                   </ul>
                </div>
             </div>
             <div class="col-md-6">
                <div class="widget_menu">
                   <h3>Hesap</h3>
                   <ul>
                      <li><a href="{{ url('user/profile') }}">Hesabım</a></li>
                      <li><a href="{{url('login')}}">Giriş Yap</a></li>
                      <li><a href="{{url('register')}}">Kayıt Ol</a></li>
                      <li><a href="{{url('products')}}">Alışveriş</a></li>
                   </ul>
                </div>
             </div>
                </div>
             </div>
             <div class="col-md-5">
                <div class="widget_menu">
                   <h3>Bülten</h3>
                   <div class="information_f">
                     <p>Bültenimize abone olarak güncellemeleri alın.</p>
                   </div>
                   <div class="form_sub">
                      <form action="{{ route('subscribe') }}" method="POST">
                        @csrf
                         <fieldset>
                            <div class="field">
                               <input type="email" placeholder="E-posta Adresinizi Girin" name="email" />
                               <input type="submit" value="Abone Ol" />
                            </div>
                         </fieldset>
                      </form>
                   </div>
                </div>
             </div>
             </div>
          </div>
       </div>
    </div>
 </footer>
