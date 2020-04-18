@extends("layout.primary_layout")


@section("content")
    <div class="container" style="margin-top: 60px;">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
           <div class="card text-center">
                <div class="card-header">
                    <svg class="bi bi-chat-square-dots" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v8a1 1 0 001 1h2.5a2 2 0 011.6.8L8 14.333 9.9 11.8a2 2 0 011.6-.8H14a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v8a2 2 0 002 2h2.5a1 1 0 01.8.4l1.9 2.533a1 1 0 001.6 0l1.9-2.533a1 1 0 01.8-.4H14a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
                        <path d="M5 6a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                    </svg>
                    اذا كنت احد الحملات التطوعية -
                 يمكنك انشاء حسابك الان
                </div>
               <a href="/admin_register"  class="btn btn-success"><i class="fa fa-chevron-right  "> انشاء حساب الان  </i></a>

               admin_register
               <div id="message1" class="alert alert-primary" role="alert">
اذا واجهت اي مشكلة تواصل مع الكادر
                   <div class="card-header">
                       prog.karrar@gmail.com
                   </div>

                   <a class="btn btn-shadow" href="tel:07711433222">
                       <svg class="bi bi-phone" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd"
                                 d="M11 1H5a1 1 0 00-1 1v12a1 1 0 001 1h6a1 1 0 001-1V2a1 1 0 00-1-1zM5 0a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V2a2 2 0 00-2-2H5z"
                                 clip-rule="evenodd"/>
                           <path fill-rule="evenodd" d="M8 14a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                       </svg>
                       07711433222 اتصال </a>
                   <a></a>
               </div>



            </div>

        </div>
    </div>


        <div class="container" style="margin-top: 60px;">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="card text-center">
                        <div class="card-header">

                          اذا لم تكن احد المتطوعين
                        </div>
                        <div class="card-header">
                     لازال بأمكانك الوصول الى المستحقين من خلال الخارطة  ويمكنك اضافة عائلتك او عائلة جارك على الخارطة والاستفادة من بقية الخدمات
                        </div>



                </div>
            </div>

@endsection