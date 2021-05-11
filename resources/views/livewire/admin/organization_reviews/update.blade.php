<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Organization Reviews') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.organization_reviews.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Organization_Reviews')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

            
            <!-- Title Input -->
            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('User') }}</label>
                {{ $organization_reviews->user->name }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Description') }}</label>
                {{ $organization_reviews->description }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Date/s') }}</label>
                {{ $organization_reviews->from }} - {{ $organization_reviews->to }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Officers') }}</label>
                {{ $organization_reviews->officers }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Service Saught') }}</label>
                {{ $organization_reviews->service_requested }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Service Recieved') }}</label>
                {{ $organization_reviews->service_recieved }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Service Quality') }}</label>
                {{ $organization_reviews->service_quality }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Process Clarity') }}</label>
                {{ $organization_reviews->process_clarity }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Efficiency and Timeliness') }}</label>
                {{ $organization_reviews->efficiency_timeliness }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Total days taken for work') }}</label>
                {{ $organization_reviews->no_days }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Corruption score') }}</label>
                {{ $organization_reviews->bribery_corruption }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Reference No.') }}</label>
                {{ $organization_reviews->reference_no }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Evidence') }}</label>
                {{ $organization_reviews->evidence }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Message to Organization') }}</label>
                {{ $organization_reviews->note_to_organization_head }}
            </div>
            
            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Report to authorities') }}</label>
                {{ $organization_reviews->send_user_information_to_authorities }}
            </div>
            
            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('I confirm truthfullness') }}</label>
                {{ $organization_reviews->confirm_truthfullness }}
            </div>
            
            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Review status') }}</label>
                {{ $organization_reviews->status }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Status') }}</label>
                {{ $organization_reviews->status }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Meta') }}</label>
                {{ $organization_reviews->meta_data }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Is user a staff member?') }}</label>
                {{ $organization_reviews->staff }}
            </div>
            
         
         <!-- 


         $review->rating = 0;
            -->
            

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.organization_reviews.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
