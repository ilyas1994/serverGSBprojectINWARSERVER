@extends(AdminTemplate::getViewPath('_layout.base'))

@section('content')
    <div class="wrapper" id="vueApp">
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            @include(AdminTemplate::getViewPath('_partials.header'))
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include(AdminTemplate::getViewPath('_partials.navigation'))
        </aside>

        <div class="content-wrapper">

               <div class="col-12 justify-content-end d-flex pb-2">
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf

                   </form>

                   <button class="btn btn-primary btnExit me-3 mt-3" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">Выход</button>
               </div>


{{--            <div class="content-header">--}}
{{--                <div class="container-fluid">--}}
{{--                    <div class="row mb-2 align-items-center">--}}
{{--                      <div class="col-sm-12">--}}
{{--                        {!! $template->renderBreadcrumbs($breadcrumbKey) !!}--}}
{{--                      </div>--}}

{{--                      <div class="col-sm-12">--}}
{{--                        <h1>--}}

{{--                          {!! $title !!}--}}
{{--                        </h1>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="content body">
                @stack('content.top')

                {!! $content !!}

                @stack('content.bottom')
            </div>
        </div>
    </div>
@stop
