@extends("layouts.backend")

@section("pageTitle")
    Ürünler
@endsection

@section("pageHeaderBreadCrumbs")
    <li><span>Ürünler</span></li>
@endsection

@section("content")

    <!-- start: page -->
    <div class="row">
        <div class="col">
            <section class="card">

                <div class="card-body">
                    <a href="{{route("backend.product.create")}}"
                       class="mb-1 mt-0 mr-1 btn btn-success float-right btn-add-new">Yeni Ekle</a>
                    <table class="table table-responsive-md table-hover mb-0 table-bordered  mb-0"
                           id="datatable-default" data-page-length='25'>
                        <thead>
                        <tr>
                            <th style="width: 50px !important;">#</th>
                            <th style="width: 155px ;">Resim</th>
                            <th>Başlık</th>
                            <th>Kategorisi</th>
                            <th class="align-content-center text-center" style="width: 50px !important;">Durum</th>
                            <th style="width: 85px;">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                <td class="primary">{{$product->id}}</td>
                                <td><img width="150"
                                         src="{{$product->image ? asset("uploads/product/{$product->image}"):""}}">
                                </td>
                                <td>{{$product->name}}</td>
                                <td>
                                    @if(empty($product->category))
                                        <div class="alert alert-danger">
                                            <strong>Dikkat!</strong> Kategorisi yok.
                                        </div>
                                    @else
                                        {{$product->category->title}}
                                    @endif
                                </td>
                                <td class="align-content-center text-center"><span
                                            class='badge {{$product->status ? "badge-success" : "badge-danger"}}'>{{$product->status ? "Aktif" : "Pasif"}}</span>
                                </td>
                                <td class="actions-hover actions-fade">
                                    <a class="mb-1 mt-1 mr-1 btn btn-warning text-white"
                                       href="{{route("backend.product.edit", ["id"=>$product->id])}}"><i
                                                class="fas fa-pencil-alt"></i> </a>
                                    <a data-id="{{$product}}"
                                       class="mb-1 mt-1 mr-1 btn btn-danger text-white delete"><i
                                                class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <!-- end: page -->
@endsection


@push("customVendorJs")
    <!-- Specific Page Vendor -->
    <script src="{{asset("assets/backend/vendor/datatables/media/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("assets/backend/vendor/datatables/media/js/dataTables.bootstrap4.min.js")}}"></script>

@endpush
@push("customJs")
    <!-- Examples -->
    <script src="{{asset("assets/backend/js/examples/examples.datatables.default.js")}}"></script>


    <script>

        $(".delete").click(function () {
            swal({
                title: 'Silmek istediğinize emin misiniz?',
                text: "İşlemin geri dönüşü yoktur!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Evet, sil',
                cancelButtonText: 'Vazgeç'
            }).then((result) => {
                if (result.value) {

                    var button = $(this);

                    swal({
                        title: 'İşlem gerçekleştiriliyor...',
                        html:
                            '<i class="fas fa-circle-notch fa-spin fa-3x fa-fw"></i>' +
                            ' <span class="sr-only">Loading...</span>',

                        showCloseButton: false,
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });

                    $.ajax({
                        type: "post",
                        url: "{{route("backend.product.delete")}}",
                        data: {
                            _token: "{{csrf_token()}}",
                            id: button.data("id").id
                        },

                        success: function (response, textStatus, xhr) {
                            if (textStatus == "success") {
                                button.closest("tr").remove();
                                swal.close();
                                swal({
                                    type: textStatus,
                                    title: response.title,
                                    text: response.message,
                                });

                                /*if ($.fn.DataTable.isDataTable("#datatable-default")) {
                                    $('#datatable-default').DataTable().clear().destroy();
                                }

                                $("#datatable-default").dataTable({
                                });*/
                            }
                        },
                        error: function (response) {
                            swal.close();

                            let error = false;
                            let output = "<span style='color:#f27474'>";
                            for (property in response.responseJSON.errors) {
                                output += response.responseJSON.errors[property] + ' <br>';
                                error = true;
                            }

                            swal({
                                type: "error",
                                title: "Hata oluştu!",
                                html: (error ? output : "") + (!error ? response.responseJSON.message + "<br>" : "") + "Lütfen tekrar deneyin!"
                            });
                        }
                    })

                }
            })
        });
    </script>
@endpush
@push("customCss")
    <link rel="stylesheet" href="{{asset("assets/backend/vendor/select2/css/select2.css")}}"/>
    <link rel="stylesheet" href="{{asset("assets/backend/vendor/select2-bootstrap-theme/select2-bootstrap.min.css")}}"/>
    <link rel="stylesheet" href="{{asset("assets/backend/vendor/datatables/media/css/dataTables.bootstrap4.css")}}"/>
@endpush