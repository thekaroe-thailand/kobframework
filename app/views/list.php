<div>User List</div>

<table border='1'>
    <thead>
        <tr>
            <th>name</th>
            <th>email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['users'] as $user): ?>
        <tr>
            <td><?php echo $user->name ?></td>
            <td><?php echo $user->email ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>