<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

            <div class="section-body">
            <div class="card">
                <div class="card-body col-12">
                    <div class="tabs">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#basic" data-toggle="tab"> <?php echo e(trans('admin/main.basic')); ?> </a></li>
                            <li class="nav-item"><a class="nav-link" href="#terms" data-toggle="tab"><?php echo e(trans('admin/main.terms')); ?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="basic" class="tab-pane active">
                                <div class="table-responsive">
                             <?php
    $basicSetting = $settings->where('name', \App\Models\Setting::$registrationBonusSettingsName)->first();
    $basicValue = !empty($basicSetting) ? $basicSetting->value : null;

    if (!empty($basicValue)) {
        $basicValue = json_decode($basicValue, true);
    }
?>

<div class="row">
    <div class="col-12 col-md-6">
        <form action="<?php echo e(getAdminPanelUrl('/registration_bonus/settings')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="page" value="general">
            <input type="hidden" name="name" value="<?php echo e(\App\Models\Setting::$registrationBonusSettingsName); ?>">
            <input type="hidden" name="locale" value="<?php echo e(\App\Models\Setting::$defaultSettingsLocale); ?>">

            <?php
                $switchs = ['status', 'unlock_registration_bonus_instantly', 'unlock_registration_bonus_with_referral'];
            ?>


            <div class="form-group custom-switches-stacked ">
                <label class="custom-switch pl-0 d-flex align-items-center">
                    <input type="hidden" name="value[status]" value="0">
                    <input type="checkbox" name="value[status]" id="statusSwitch" value="1" <?php echo e((!empty($basicValue) and !empty($basicValue['status']) and $basicValue['status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                    <span class="custom-switch-indicator"></span>
                    <label class="custom-switch-description mb-0 cursor-pointer" for="statusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                </label>

                <div class="text-muted text-small"><?php echo e(trans('update.registration_bonus_setting_active_hint')); ?></div>
            </div>

            <div class="form-group custom-switches-stacked ">
                <label class="custom-switch pl-0 d-flex align-items-center">
                    <input type="hidden" name="value[unlock_registration_bonus_instantly]" value="0">
                    <input type="checkbox" name="value[unlock_registration_bonus_instantly]" id="unlock_registration_bonus_instantlySwitch" value="1" <?php echo e((!empty($basicValue) and !empty($basicValue['unlock_registration_bonus_instantly']) and $basicValue['unlock_registration_bonus_instantly']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                    <span class="custom-switch-indicator"></span>
                    <label class="custom-switch-description mb-0 cursor-pointer" for="unlock_registration_bonus_instantlySwitch"><?php echo e(trans('update.unlock_registration_bonus_instantly')); ?></label>
                </label>

                <div class="text-muted text-small"><?php echo e(trans('update.unlock_registration_bonus_instantly_hint')); ?></div>
            </div>

            <div class="js-unlock-registration-bonus-with-referral-field form-group custom-switches-stacked <?php echo e((!empty($basicValue) and !empty($basicValue['unlock_registration_bonus_instantly'])) ? 'd-none' : ''); ?>">
                <label class="custom-switch pl-0 d-flex align-items-center">
                    <input type="hidden" name="value[unlock_registration_bonus_with_referral]" value="0">
                    <input type="checkbox" name="value[unlock_registration_bonus_with_referral]" id="unlock_registration_bonus_with_referralSwitch" value="1" <?php echo e((!empty($basicValue) and !empty($basicValue['unlock_registration_bonus_with_referral']) and $basicValue['unlock_registration_bonus_with_referral']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                    <span class="custom-switch-indicator"></span>
                    <label class="custom-switch-description mb-0 cursor-pointer" for="unlock_registration_bonus_with_referralSwitch"><?php echo e(trans('update.unlock_registration_bonus_with_referral')); ?></label>
                </label>

                <div class="text-muted text-small"><?php echo e(trans('update.unlock_registration_bonus_with_referral_hint')); ?></div>
            </div>

            <div class="js-number-of-referred-users-field form-group <?php echo e((!empty($basicValue) and !empty($basicValue['unlock_registration_bonus_with_referral'])) ? '' : 'd-none'); ?>">
                <label><?php echo e(trans('update.number_of_referred_users')); ?></label>
                <input type="number" name="value[number_of_referred_users]" value="<?php echo e((!empty($basicValue) and !empty($basicValue['number_of_referred_users'])) ? $basicValue['number_of_referred_users'] : old('number_of_referred_users')); ?>" class="form-control"/>
                <div class="text-muted text-small mt-1"><?php echo e(trans('update.number_of_referred_users_hint')); ?></div>
            </div>

            <div class="js-enable-referred-users-purchase-field form-group custom-switches-stacked <?php echo e((!empty($basicValue) and !empty($basicValue['unlock_registration_bonus_instantly'])) ? 'd-none' : ((!empty($basicValue) and !empty($basicValue['unlock_registration_bonus_with_referral'])) ? '' : 'd-none')); ?>">
                <label class="custom-switch pl-0 d-flex align-items-center">
                    <input type="hidden" name="value[enable_referred_users_purchase]" value="0">
                    <input type="checkbox" name="value[enable_referred_users_purchase]" id="enable_referred_users_purchaseSwitch" value="1" <?php echo e((!empty($basicValue) and !empty($basicValue['enable_referred_users_purchase']) and $basicValue['enable_referred_users_purchase']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                    <span class="custom-switch-indicator"></span>
                    <label class="custom-switch-description mb-0 cursor-pointer" for="enable_referred_users_purchaseSwitch"><?php echo e(trans('update.enable_referred_users_purchase')); ?></label>
                </label>

                <div class="text-muted text-small"><?php echo e(trans('update.enable_referred_users_purchase_hint')); ?></div>
            </div>

            <div class="js-purchase-amount-for-unlocking-bonus-field form-group <?php echo e((!empty($basicValue) and !empty($basicValue['enable_referred_users_purchase'])) ? '' : 'd-none'); ?>">
                <label><?php echo e(trans('update.purchase_amount_for_unlocking_bonus')); ?></label>
                <input type="number" name="value[purchase_amount_for_unlocking_bonus]" value="<?php echo e((!empty($basicValue) and !empty($basicValue['purchase_amount_for_unlocking_bonus'])) ? $basicValue['purchase_amount_for_unlocking_bonus'] : old('purchase_amount_for_unlocking_bonus')); ?>" class="form-control"/>
                <div class="text-muted text-small mt-1"><?php echo e(trans('update.purchase_amount_for_unlocking_bonus_hint')); ?></div>
            </div>

            <div class="form-group">
                <label><?php echo e(trans('update.registration_bonus_amount')); ?></label>
                <input type="number" name="value[registration_bonus_amount]" value="<?php echo e((!empty($basicValue) and !empty($basicValue['registration_bonus_amount'])) ? $basicValue['registration_bonus_amount'] : old('registration_bonus_amount')); ?>" class="form-control"/>
                <div class="text-muted text-small mt-1"><?php echo e(trans('update.registration_bonus_amount_hint')); ?></div>
            </div>

            <div class="form-group">
                <label><?php echo e(trans('update.bonus_wallet')); ?></label>
                <select name="value[bonus_wallet]" class="form-control">
                    <option value="income_wallet" <?php echo e((!empty($basicValue) and !empty($basicValue['bonus_wallet']) and $basicValue['bonus_wallet'] == "income_wallet") ? 'selected' : ''); ?>><?php echo e(trans('update.income_wallet')); ?></option>
                    <option value="balance_wallet" <?php echo e((!empty($basicValue) and !empty($basicValue['bonus_wallet']) and $basicValue['bonus_wallet'] == "balance_wallet") ? 'selected' : ''); ?>><?php echo e(trans('update.balance_wallet')); ?></option>
                </select>
                <div class="text-muted text-small mt-1"><?php echo e(trans('update.bonus_wallet_hint')); ?></div>
            </div>


            <button type="submit" class="btn btn-primary mt-1"><?php echo e(trans('admin/main.submit')); ?></button>
        </form>
    </div>
</div>

                                </div>

                                <div class="text-center mt-2">
                                   
                                </div>
                            </div>

                           
                               
                            <div id="terms" class="tab-pane">
                                <div class="table-responsive">
                          <?php
    $termsSetting = $settings->where('name', \App\Models\Setting::$registrationBonusTermsSettingsName)->first();

    $termsValue = (!empty($termsSetting) and !empty($termsSetting->translate($selectedLocale))) ? $termsSetting->translate($selectedLocale)->value : null;

    if (!empty($termsValue)) {
        $termsValue = json_decode($termsValue, true);
    }
?>


<form action="<?php echo e(getAdminPanelUrl('/registration_bonus/settings')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="page" value="general">
    <input type="hidden" name="name" value="<?php echo e(\App\Models\Setting::$registrationBonusTermsSettingsName); ?>">

    <div class="row">
        <div class="col-12 col-md-6">
            <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                    <select name="locale" class="form-control js-edit-content-locale">
                        <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($lang); ?>" <?php if(mb_strtolower(request()->get('locale', (!empty($termsValue) and !empty($termsValue['locale'])) ? $termsValue['locale'] : app()->getLocale())) == mb_strtolower($lang)): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['locale'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            <?php else: ?>
                <input type="hidden" name="locale" value="<?php echo e(getDefaultLocale()); ?>">
            <?php endif; ?>


            <div class="form-group mt-15">
                <label class="input-label"><?php echo e(trans('public.image')); ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text admin-file-manager" data-input="term_image" data-preview="holder">
                            <i class="fa fa-upload"></i>
                        </button>
                    </div>
                    <input type="text" name="value[term_image]" id="term_image" value="<?php echo e((!empty($termsValue) and !empty($termsValue['term_image'])) ? $termsValue['term_image'] : old('term_image')); ?>" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                    <div class="input-group-append">
                        <button type="button" class="input-group-text admin-file-view" data-input="term_image">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div id="addAccountTypes">

                <button type="button" class="btn btn-success add-btn mb-4 fa fa-plus"></button>

                <?php if(!empty($termsValue) and !empty($termsValue['items'])): ?>

                    <?php if(!empty($termsValue) and is_array($termsValue['items'])): ?>
                        <?php $__currentLoopData = $termsValue['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group d-flex align-items-start">
                                <div class="px-2 py-1 border flex-grow-1">

                                    <div class="form-group mb-1">
                                        <label class="mb-1"><?php echo e(trans('admin/main.icon')); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="input-group-text admin-file-manager" data-input="icon_record" data-preview="holder">
                                                    <i class="fa fa-upload"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="value[items][<?php echo e($key); ?>][icon]" id="icon_<?php echo e($key); ?>" value="<?php echo e($item['icon'] ?? ''); ?>" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="form-group mb-1">
                                        <label class="mb-1"><?php echo e(trans('admin/main.title')); ?></label>
                                        <input type="text" name="value[items][<?php echo e($key); ?>][title]"
                                               class="form-control"
                                               value="<?php echo e($item['title'] ?? ''); ?>"
                                        />
                                    </div>

                                    <div class="form-group mb-1">
                                        <label class="mb-1"><?php echo e(trans('public.description')); ?></label>
                                        <input type="text" name="value[items][<?php echo e($key); ?>][description]"
                                               class="form-control"
                                               value="<?php echo e($item['description'] ?? ''); ?>"
                                        />
                                    </div>
                                </div>
                                <button type="button" class="fas fa-times btn ml-2 remove-btn btn-danger"></button>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-1"><?php echo e(trans('admin/main.submit')); ?></button>
</form>

<div class="main-row d-none">
    <div class="form-group d-flex align-items-start">
        <div class="px-2 py-1 border flex-grow-1">

            <div class="form-group mb-1">
                <label class="mb-1"><?php echo e(trans('admin/main.icon')); ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text admin-file-manager" data-input="icon_record" data-preview="holder">
                            <i class="fa fa-upload"></i>
                        </button>
                    </div>
                    <input type="text" name="value[items][record][icon]" id="icon_record" value="" class="form-control"/>
                </div>
            </div>

            <div class="form-group mb-1">
                <label class="mb-1"><?php echo e(trans('admin/main.title')); ?></label>
                <input type="text" name="value[items][record][title]"
                       class="form-control"
                />
            </div>

            <div class="form-group mb-1">
                <label class="mb-1"><?php echo e(trans('public.description')); ?></label>
                <input type="text" name="value[items][record][description]"
                       class="form-control"
                />
            </div>
        </div>
        <button type="button" class="fas fa-times btn ml-2 remove-btn btn-danger d-none"></button>
    </div>
</div></div></div></div></div></div></div></div></div>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/settings/site_bank_accounts.min.js"></script>
<?php $__env->stopPush(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                                                
                    </div>
                </div>
            </div>
        </div>
    </section>





<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\platform\resources\views/admin/registration_bonus/settings/index.blade.php ENDPATH**/ ?>