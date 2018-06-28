<div id="app" class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="first_name">@lang('app.role')</label>
            {!! Form::select('role_id', $roles, $edit ? $user->role->id : '',
                ['class' => 'form-control', 'id' => 'role_id', $profile ? 'disabled' : '']) !!}
        </div>
        <div class="form-group">
            <label for="status">@lang('app.status')</label>
            {!! Form::select('status', $statuses, $edit ? $user->status : '',
                ['class' => 'form-control', 'id' => 'status', $profile ? 'disabled' : '']) !!}
        </div>
        <div class="form-group">
            <label for="display_name">@lang('app.display_name')</label>
            <input type="text" class="form-control" id="display_name"
                   name="display_name" placeholder="@lang('app.display_name')" value="{{ $edit ? $user->display_name : '' }}">
        </div>
        <div class="form-group">
            <label for="gender">@lang('app.gender')</label>
            {!! Form::select('gender', $gender, $edit ? $user->gender : '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <label for="id_card">@lang('app.id_card')</label>
            <input type="text" class="form-control" id="id_card"
                   name="id_card" placeholder="@lang('app.id_card')" value="{{ $edit ? $user->id_card : '' }}">
        </div>
        <div class="form-group">
            <label for="birthday">@lang('app.date_of_birth')</label>
            <div class="form-group">
                <input type="text" name="birthday" id='birthday' value="{{ $edit && $user->birthday ? $user->present()->birthday : '' }}"
                    class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="phone">@lang('app.phone')</label>
            <input type="text" class="form-control" id="phone"
                   name="phone" placeholder="@lang('app.phone')" value="{{ $edit ? $user->phone : '' }}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="address">@lang('app.address')</label>
            <input type="text" class="form-control" id="address"
                   name="address" placeholder="@lang('app.address')" value="{{ $edit ? $user->address : '' }}">
        </div>
        <div class="form-group">
            <label for="country_id">@lang('app.country_id')</label>
            {!! Form::select('country_id', $countries, $edit ? $user->country_id : '', ['class' => 'form-control', 'v-model' => 'countryId', 'v-on:change' => 'getProvince']) !!}
        </div>
        <div class="form-group" v-if="countryId == 764">
            <label for="province_id">@lang('app.province_id')</label>
            <select v-model="provinceId" class="form-control" v-on:change="getAmphure" name="province_id">
                <option disabled value="">Please select one</option>
                <option v-for="(key, province) in provinces" v-bind:value="key">@{{ province }}</option>
            </select>
        </div>
        <div class="form-group" v-if="provinceId && countryId == 764">
            <label for="amphure_id">@lang('app.amphure_id')</label>
            <select v-model="amphureId" class="form-control" v-on:change="getDistrict" name="amphure_id">
                <option disabled value="">Please select one</option>
                <option v-for="(key, amphure) in amphures" v-bind:value="key">@{{ amphure }}</option>
            </select>
        </div>
        <div class="form-group" v-if="amphureId && countryId == 764">
            <label for="district_id">@lang('app.district_id')</label>
            <select v-model="districtId" class="form-control" name="district_id">
                <option disabled value="">Please select one</option>
                <option v-for="(key, district) in districts" v-bind:value="key">@{{ district }}</option>
            </select>
        </div>
    </div>
    @if ($edit)
        <div class="col-md-12 mt-2">
            <button type="submit" class="btn btn-primary" id="update-details-btn">
                <i class="fa fa-refresh"></i>
                @lang('app.update_details')
            </button>
        </div>
    @endif
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script> 
    new Vue ({
        el: '#app',
        data () {
            return {
                'countryId'     : {!! $user->country_id !!},
                'provinceId'    : {!! $user->province_id !!},
                'amphureId'     : {!! $user->amphure_id !!},
                'districtId'    : {!! $user->district_id !!},
                'provinces'     : {!! json_encode($provinces) !!},
                'districts'     : {!! json_encode($districts) !!},
                'amphures'      : {!! json_encode($amphures) !!},
            }
        },
        methods: {
            getProvince() {
                if (this.countryId == 764) {
                    axios.get( 'api/provinces/' + this.countryId).then((response) => {
                        this.provinces = response.data
                        this.provinceId = null
                        this.amphures = null
                        this.amphureId = null
                        this.districts = null
                        this.districtId = null
                    })
                }
            },
            getAmphure() {
                if (this.provinceId != 0) {
                    axios.get( 'api/amphures/' + this.provinceId).then((response) => {
                        this.amphures = response.data
                        this.amphureId = null
                        this.districts = null
                        this.districtId = null
                    })
                }
            },
            getDistrict() {
                if (this.amphureId != 0) {
                    axios.get( 'api/districts/' + this.amphureId).then((response) => {
                        this.districts = response.data
                        this.districtId = null
                    })
                }
            }
        }
    });
</script>

