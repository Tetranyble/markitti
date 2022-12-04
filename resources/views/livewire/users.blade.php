<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Users</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <div class="form-check">
                                    <input class="form-check-input"
                                           wire:model="active"
                                           type="checkbox"  id="active">
                                    <label class="form-check-label" for="active">
                                        Active
                                    </label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center">
                                    <div class="col-auto">
                                        <input type="text" id="storeSearch"
                                               wire:model="storeSearch"
                                               name="storeSearch"
                                               class="form-control search-orders"
                                               placeholder="Search">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary">Search</button>
                                    </div>
                                </form>

                            </div><!--//col-->
                            @if(auth()->user()->isSuperAdmin())
                            <div class="col-auto">
                                <select wire:model="storeType" class="form-select w-auto" >
                                    <option value="">No Option</option>
                                    @forelse($storeTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @empty
                                        <option >No store types</option>
                                    @endforelse

                                </select>
                            </div>
                            @endif
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->

            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                    <tr>
                                        <th class="cell">
                                            <div class="">
                                                <button class="btn" wire:click="sortBy('id')">ID</button>
                                                <x-sort-icon
                                                    field="id"
                                                    :sortField="$sortField"
                                                    :sortAsc="$sortAsc"
                                                />

                                            </div>
                                        </th>
                                        <th class="cell">
                                            <div class="">
                                                <button class="btn" wire:click="sortBy('firstname')">Name</button>
                                                <x-sort-icon
                                                    field="firstname"
                                                    :sortField="$sortField"
                                                    :sortAsc="$sortAsc"
                                                />

                                            </div>
                                        </th>
                                        <th class="cell">
                                            <div class="">
                                                <button class="btn" wire:click="sortBy('phone')">Phone</button>
                                                <x-sort-icon
                                                    field="phone"
                                                    :sortField="$sortField"
                                                    :sortAsc="$sortAsc"
                                                />

                                            </div>
                                        </th>
                                        <th class="cell">
                                            <div class="">
                                                <button class="btn" wire:click="sortBy('email_verified_at')">Verified</button>
                                                <x-sort-icon
                                                    field="email_verified_at"
                                                    :sortField="$sortField"
                                                    :sortAsc="$sortAsc"
                                                />

                                            </div>
                                        </th>
                                        <th class="cell">
                                            <div class="">
                                                <button class="btn" wire:click="sortBy('created_at')">Joined Date</button>
                                                <x-sort-icon
                                                    field="created_at"
                                                    :sortField="$sortField"
                                                    :sortAsc="$sortAsc"
                                                />

                                            </div>
                                        </th>
                                        <th class="cell">Status</th>
                                        <th class="cell">Environment</th>
                                        <th class="cell"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td class="cell">#{{ $user->code }}</td>
                                            <td class="cell">
                                                <span class="truncate">{{ $user->longname }}</span>
                                                @if(auth()->user()->isSuperAdmin())
                                                <span class="note">
                                                    {{ $user->code }} <a href="#">Impersonate</a>
                                                </span>
                                                @endif
                                            </td>
                                            <td class="cell">{{ $user?->phone }}
                                                <span class="note">
                                                    {{ $user?->email }}
                                                </span>
                                            </td>
                                            <td class="cell">
                                                @if($isVerified === $user->id)
                                                    <div class="flex align-items-center">
                                                        <button type="button"
                                                                wire:click="confirmVerification({{ $user->id }})"
                                                                class="btn btn-outline-success" >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                                            </svg>
                                                        </button>
                                                        <button type="button"
                                                                wire:click="cancelVerification()"
                                                                class="btn btn-outline-danger" >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                @else
                                                    <button type="button"
                                                            wire:click="verified({{ $user->id }})"
                                                            class="btn" >
                                                        @if($user->email_verified_at )
                                                            <span class="badge bg-success">Verified</span>
                                                        @else
                                                            <span class="badge bg-warning">Not verified</span>
                                                        @endif
                                                    </button>
                                                @endif

                                            </td>
                                            <td class="cell">{{ $user->joinedDate() }}
                                                <span class="note">
                                                    {{ $user->joinedTime() }}
                                                </span>
                                            </td>
                                            <td class="cell">
                                                @if($isBlocked === $user->id)
                                                    <div class="flex align-items-center">
                                                        <button type="button"
                                                                wire:click="confirmIsBlocked({{ $user->id }})"
                                                                class="btn btn-outline-success" >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                                            </svg>
                                                        </button>
                                                        <button type="button"
                                                                wire:click="cancelIsBlocked()"
                                                                class="btn btn-outline-danger" >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                @else
                                                    <button type="button"
                                                            wire:click="block({{ $user->id }})"
                                                            class="btn" >
                                                        @if(!$user->is_blocked )
                                                            <span class="badge bg-danger">Inactive</span>
                                                        @else
                                                            <span class="badge bg-success">Active</span>
                                                        @endif
                                                    </button>
                                                @endif

                                            </td>
                                            <td class="cell">
                                                <a class="btn-sm"
                                                   href="{{ $user->storeUrl() }}" target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                                                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td>No Data</td></tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->

                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                    {{ $users->links('admin.paginations.dashboard') }}
                </div><!--//tab-pane-->
            </div><!--//tab-content-->



        </div><!--//container-fluid-->
    </div><!--//app-content-->

    <x-dashboard-footer/>

    <div wire:ignore.self class="modal fade" id="deleteUser" tabindex="-1"
         role="dialog" aria-labelledby="Delete User" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>

</div>


</div><!--//app-wrapper-->
