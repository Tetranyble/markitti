<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Stores</h1>
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
                                        <th class="cell">ID</th>
                                        <th class="cell">
                                            <div class="">
                                                <button class="btn" wire:click="sortBy('name')">Name</button>
                                                <x-sort-icon
                                                    field="name"
                                                    :sortField="$sortField"
                                                    :sortAsc="$sortAsc"
                                                />

                                            </div>
                                        </th>
                                        <th class="cell">Admin Contact</th>
                                        <th class="cell">
                                            <div class="">
                                                <button class="btn" wire:click="sortBy('server')">Server</button>
                                                <x-sort-icon
                                                    field="server"
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
                                        <th class="cell">Users</th>
                                        <th class="cell"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($stores as $store)
                                    <tr>
                                        <td class="cell">#{{ $store->id }}</td>
                                        <td class="cell"><span class="truncate">{{ $store->name }}</span>
                                            <span class="note">
                                                {{ $store?->code }}
                                            </span></td>
                                        <td class="cell">{{ $store->storeAdmin()?->longname }}
                                            <span class="note">
                                                <a class="note" href="tel:{{ $store->storeAdmin()?->phone }}">{{ $store->storeAdmin()?->phone }}</a>
                                            </span>
                                        </td>
                                        <td class="cell"><span>{{ $store->server }}</span></td>
                                        <td class="cell">{{$store->created_at }}</td>
                                        <td class="cell">

                                        </td>
                                        <td class="cell">{{ $store->users()->count() }}</td>
                                        <td class="cell">
                                            <a class="btn-sm"
                                                            href="{{ $store->applicationUrl() }}" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                                                    <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>There seems to be no records</tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->

                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                    {{ $stores->links('admin.paginations.dashboard') }}
                </div><!--//tab-pane-->
            </div><!--//tab-content-->



        </div><!--//container-fluid-->
    </div><!--//app-content-->

    <x-dashboard-footer/>

</div><!--//app-wrapper-->
