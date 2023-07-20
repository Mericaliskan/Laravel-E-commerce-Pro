<section class="subscribe_section">
    <div class="container-fuild">

        <div class="box">
            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                {{session()->get('message')}}
            </div>
            @endif
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <div class="subscribe_form ">
                     <div class="heading_container heading_center">
                        <h3>İndirim Teklifleri Almak İçin Abone Ol</h3>
                     </div>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                     <form action="{{ route('subscribe') }}" method="POST">
                        @csrf
                        <input type="email" placeholder="Email adresinizi girin" name="email">
                        <button type="submit">
                        Abone Ol
                        </button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
    </div>
 </section>
