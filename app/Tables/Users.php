<?php

namespace App\Tables;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Excel;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Users extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return User::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->column('name', sortable: true)
            ->column('gender')
            ->column('email')
            ->column(
                key: 'created_at',
                alignment: 'center',
                sortable: true,
                label: 'joined date', as :fn($created_at, $user) => Carbon::parse($created_at)->isoFormat('D MMMM Y')
            )
            ->column(
                key: 'actions',
                alignment: 'center',
                exportAs: false
            )
            ->withGlobalSearch(
                'Search through the data...',
                columns: ['name', 'email']
            )
            ->selectFilter(
                key: 'gender',
                options: ['male' => 'Male', 'female' => 'Female'],
                noFilterOption: true,
                noFilterOptionLabel: 'All'
            )
            ->export(
                label: 'Excel export',
                filename: 'users.xls',
                type: Excel::XLS
            )
            ->defaultSortDesc('created_at')
            ->paginate(15);
        // ->bulkAction()
    }
}
