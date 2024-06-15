

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Lista de Jogos</h2>
            <a class="btn btn-success" href="<?php echo e(route('jogos.create')); ?>">Adicionar Jogo</a>
        </div>
        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
        <?php endif; ?>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Lançamento</th>
                <th>Preço</th>
                <th width="280px">Ações</th>
            </tr>
            <?php $__currentLoopData = $jogos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jogo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($jogo->id); ?></td>
                    <td><?php echo e($jogo->nome); ?></td>
                    <td><?php echo e($jogo->data_lancamento); ?></td>
                    <td><?php echo e($jogo->preco); ?></td>
                    <td>
                        <form action="<?php echo e(route('jogos.destroy', $jogo->id)); ?>" method="POST">
                            <a class="btn btn-info" href="<?php echo e(route('jogos.show', $jogo->id)); ?>">Mostrar</a>
                            <a class="btn btn-primary" href="<?php echo e(route('jogos.edit', $jogo->id)); ?>">Editar</a>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProgWeb\Projetos\Projeto_1\ProjetoD\projeto\resources\views/index.blade.php ENDPATH**/ ?>