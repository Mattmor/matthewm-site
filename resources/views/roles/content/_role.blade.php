<div class="container">
    <div class="row">
        <h1>{{ $role->name }}</h1>
        <hr>

        @if (count($users) >= 1)
        <h3>Users with this role:</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Unlink user</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>
                        <?php echo Form::open(array('action' => ['RolesController@unlinkUser', $user->id], 'method' => 'patch')); ?>
                        <?php echo Form::submit('Unlink', ['class' => 'btn btn-danger']); ?>
                        <?php echo Form::close(); ?>
                    </td>
                </tr>
    @endforeach
        </tbody>
    </table>
    @else
    <h3>There are no users with this role.</h3>
    <hr>
    @endif
    <h3>Add this role to a user: </h3>
    <?php echo Form::open(array('action' => ['RolesController@linkUser', $role->slug], 'method' => 'patch')); ?>
    <div class="form-group">
    <select class="form-control" name="user">
        @foreach ($usersWithoutRole as $userWithoutRole)
            <option value="{{ $userWithoutRole->id }}">{{ $userWithoutRole->name }}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
    <?php echo Form::submit('add user', ['class' => 'btn btn-primary form-control']); ?>
    </div>
    <?php echo Form::close(); ?>
    </div>
</div>
