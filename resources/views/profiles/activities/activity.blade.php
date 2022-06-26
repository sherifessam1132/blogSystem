<div class="card mt-4">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <!--begin::Actions-->
            <div class="d-flex align-items-center mr-3" data-inbox="actions">
                <label class="checkbox checkbox-single checkbox-primary flex-shrink-0 mr-3">
                    <input type="checkbox" />
                    <span></span>
                </label>
                <a href="#" class="btn btn-icon btn-xs btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="Star">
                    <i class="flaticon-star text-muted"></i>
                </a>
                <a href="#" class="btn btn-icon btn-xs text-hover-warning" data-toggle="tooltip" data-placement="right" title="Mark as important">
                    <i class="flaticon-add-label-button text-muted"></i>
                </a>
            </div>
            <!--end::Actions-->
            <!--begin::Author-->
            <div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3" data-toggle="view">
																<span class="symbol symbol-35 mr-3">
																	<span class="symbol-label" style="background-image: url('{{asset('media/users/100_13.jpg')}}')"></span>
																</span>
                {{$heading}}
            </div>
            <!--end::Author-->
        </div>
    </div>

    <div class="card-body">





        <div class="card-body table-responsive px-0">
            <!--begin::Items-->
            <div class="list list-hover " data-inbox="list">
                <!--begin::Item-->
                <div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
                    <!--begin::Toolbar-->

                    <!--end::Toolbar-->
                {{$body}}
                </div>
                <!--end::Item-->
                <!--begin::Item-->

            </div>
            <!--end::Items-->
        </div>



    </div>

</div>
