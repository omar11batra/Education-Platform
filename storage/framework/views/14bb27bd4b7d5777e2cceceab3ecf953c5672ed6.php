<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body">

            <section class="card">
                <div class="card-body">
                    <form method="get" class="mb-0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input type="text" class="form-control text-center" name="name" value="<?php echo e(request()->get('name')); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.expiration_from')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.expiration_to')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="lsdate" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.filters')); ?></label>
                                    <select name="sort" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_users_discount')); ?></option>
                                        <option value="percent_asc" <?php if(request()->get('sort') == 'percent_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.percentage_ascending')); ?></option>
                                        <option value="percent_desc" <?php if(request()->get('sort') == 'percent_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.percentage_descending')); ?></option>
                                        <option value="created_at_asc" <?php if(request()->get('sort') == 'created_at_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.create_date_ascending')); ?></option>
                                        <option value="created_at_desc" <?php if(request()->get('sort') == 'created_at_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.create_date_descending')); ?></option>
                                        <option value="expire_at_asc" <?php if(request()->get('sort') == 'expire_at_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.expire_date_ascending')); ?></option>
                                        <option value="expire_at_desc" <?php if(request()->get('sort') == 'expire_at_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.expire_date_descending')); ?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('update.product')); ?></label>
                                    <select name="product_ids[]" multiple="multiple" class="form-control search-product-select2"
                                            data-placeholder="<?php echo e(trans('update.search_product')); ?>">

                                        <?php if(!empty($products) and $products->count() > 0): ?>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($product->id); ?>" selected><?php echo e($product->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                    <select name="status" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                        <option value="active" <?php if(request()->get('status') == 'active'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.active')); ?></option>
                                        <option value="inactive" <?php if(request()->get('status') == 'inactive'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.inactive')); ?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label mb-4"> </label>
                                    <input type="submit" class="text-center btn btn-primary w-100" value="<?php echo e(trans('admin/main.show_results')); ?>">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_discounts_create')): ?>
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/store/discounts/create" class="btn btn-primary"><?php echo e(trans('admin/main.add_new')); ?></a>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14 text-center">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-left"><?php echo e(trans('update.product')); ?></th>
                                        <th><?php echo e(trans('admin/main.percentage')); ?></th>
                                        <th><?php echo e(trans('admin/main.start_date')); ?></th>
                                        <th><?php echo e(trans('admin/main.end_date')); ?></th>
                                        <th width="150"><?php echo e(trans('admin/main.usable_times')); ?></th>
                                        <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($discount->name); ?></td>
                                            <td class="text-left">
                                                <a href="<?php echo e($discount->product->getUrl()); ?>" target="_blank"><?php echo e($discount->product->title); ?></a>
                                            </td>

                                            <td><?php echo e($discount->percent ?  $discount->percent . '%' : '-'); ?></td>

                                            <td><?php echo e(dateTimeFormat($discount->start_date, 'Y/m/d h:i:s')); ?></td>

                                            <td><?php echo e(dateTimeFormat($discount->end_date, 'Y/m/d h:i:s')); ?></td>

                                            <td>
                                                <?php if(!empty($discount->count)): ?>
                                                    <div class="media-body">
                                                        <div class=" mt-0 mb-1 font-weight-bold"><?php echo e($discount->count); ?></div>
                                                        <div class="text-primary text-small"><?php echo e(trans('admin/main.remain')); ?> : <?php echo e($discount->discountRemain()); ?></div>
                                                    </div>
                                                <?php else: ?>
                                                    <?php echo e(trans('update.unlimited')); ?>

                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <span class="<?php echo e(($discount->status == 'active') ? 'text-success' : 'text-danger'); ?>"><?php echo e(trans('admin/main.'.$discount->status)); ?></span>
                                            </td>

                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_discounts_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/store/discounts/<?php echo e($discount->id); ?>/edit" class="btn-transparent text-primary btn-sm" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_discounts_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/store/discounts/'. $discount->id.'/delete','btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($discounts->appends(request()->input())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\platform\resources\views/admin/store/discounts/lists.blade.php ENDPATH**/ ?>