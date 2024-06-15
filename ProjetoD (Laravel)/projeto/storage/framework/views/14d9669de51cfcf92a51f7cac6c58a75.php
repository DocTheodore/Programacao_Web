

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h2>Adicionar Jogo</h2>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <strong>Ops!</strong> Há algo errado com os dados inseridos.<br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('jogos.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group mb-3">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group mb-3">
                <label for="data_lancamento">Data de Lançamento:</label>
                <input type="date" name="data_lancamento" class="form-control" placeholder="Data de Lançamento">
            </div>
            <div class="form-group mb-3">
                <label for="preco">Preço:</label>
                <input type="text" name="preco" class="form-control" placeholder="Preço">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProgWeb\Projetos\Projeto_1\ProjetoD\projeto\resources\views/create.blade.php ENDPATH**/ ?>