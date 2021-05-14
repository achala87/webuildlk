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
                <label for='' class='col-sm-2 control-label'> {{ __('Reviewed by') }}</label>
                {{ $organization_reviews->user->name }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Review of') }}</label>
                {{ $organization_reviews->organization->title }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Description') }}</label>
                {{ $organization_reviews->description }}
            </div>

            <div class='form-group'>
                <label class="col-sm-2 control-label"> {{ __('Date/s') }}</label>
                {{ $organization_reviews->date_from }} - {{ $organization_reviews->date_to }}
            </div>

            <div class='form-group'>
                <label class="col-sm-2 control-label"> {{ __('Officers') }}</label>
                {{ $organization_reviews->officers }}
            </div>

            <div class='form-group'>
                <label class="col-sm-2 control-label"> {{ __('Service Saught') }}</label>
                {{ $organization_reviews->service_requested }}
            </div>

            <div class='form-group'>
                <label class="col-sm-2 control-label"> {{ __('Service Recieved') }}</label>
                {{ $organization_reviews->service_recieved }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Service Quality') }}</label>
                <?php $sqv = $organization_reviews->service_quality; ?>
                @switch($sqv)
                    @case($sqv <= 25)
                        Poor
                        @break

                    @case($sqv <= 50)
                       Acceptable
                        @break

                    @case($sqv <= 75)
                        Satisfactory
                        @break

                    @case($sqv <= 100)
                        Excellent
                        @break    
                @endswitch
                
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Process Clarity') }}</label>
                <?php $pcv = $organization_reviews->process_clarity; ?>
                @switch($pcv)
                    @case($pcv <= 25)
                        Poor
                        @break

                    @case($pcv <= 50)
                       Acceptable
                        @break

                    @case($pcv <= 75)
                        Satisfactory
                        @break

                    @case($pcv <= 100)
                        Excellent
                        @break    
                @endswitch
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Efficiency and Timeliness') }}</label>
                <?php $etv = $organization_reviews->efficiency_timeliness; ?>
                @switch($etv)
                    @case($etv <= 25)
                        Poor
                        @break

                    @case($etv <= 50)
                       Acceptable
                        @break

                    @case($etv <= 75)
                        Satisfactory
                        @break

                    @case($etv <= 100)
                        Excellent
                        @break    
                @endswitch
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Corruption score') }}</label>
               
                <?php $bcv = $organization_reviews->bribery_corruption; ?>
                @switch($bcv)
                    @case($bcv <= 0)
                        Not corrupt
                        @break

                    @case($bcv <= 50)
                       Slightly Corrupt or Corrupt
                        @break

                    @case($bcv <= 75)
                        Corrupt or Highly Corrupt
                        @break

                    @case($bcv <= 100)
                        Extremely Corrupt
                        @break    
                @endswitch
                
                <?php $corruption = json_decode($organization_reviews->meta_data, true); ?>
                @if($corruption['admin'] > 0 || $corruption['executive'] > 0 || $corruption['political'] > 0)
                | <i> Corruption at: 
                    @if($corruption['admin'] > 0)
                        administration
                    @endif
                    @if($corruption['executive'] > 0)
                        {{ ($corruption['admin'] > 0 ? ', ' : '' )}} executive
                    @endif
                    @if($corruption['political'] > 0)
                    {{ ($corruption['admin'] > 0 || $corruption['executive'] > 0  ? ', ' : '' )}} political
                    @endif
                 level. </i>
                 @endif 
            </div>

        

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Total days taken for work') }}</label>
                {{ $organization_reviews->no_days }}
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
                <label class="col-sm-2 control-label"> {{ __('Message to Organization') }}</label>
                {{ $organization_reviews->note_to_organization_head }}
            </div>
            
            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Report to authorities') }}</label>
                {{ ( $organization_reviews->send_user_information_to_authorities == 1) ? "Yes" : "No" }}
            </div>
            
            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('I confirm truthfullness') }}</label>
                {{ ( $organization_reviews->confirm_truthfullness == 1) ? "Yes" : "No" }}
            </div>

            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Is user a staff member?') }}</label>
                {{ ( $organization_reviews->staff == 1) ? "Yes" : "No" }}
            </div>
            
            <div class='form-group'>
                <label for='status' class='col-sm-2 control-label'> {{ __('Review status') }}</label>
               
                <select wire:model.lazy='status' name="status"> 
                    <option value="0" {{ ($organization_reviews->status==0 ? "selected" : "") }} value="0">Pending</option>
                    <option value="1" {{ ($organization_reviews->status==1 ? "selected" : "") }} value="1">Processed</option>
                </select>
            </div>
    
            <div class='form-group'>
                <label for='' class='col-sm-2 control-label'> {{ __('Reviewer Remarks') }}</label>
                <textarea wire:model.lazy='remarks' rows="4" id="remarks" name="remarks" cols="60">
                </textarea>
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
