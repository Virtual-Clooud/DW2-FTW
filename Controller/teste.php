$objetivo_id = $_POST['objetivo_id'];
    $status = $_POST['status'];
    $acoes_selecionadas = $_POST['acoes'] ?? [];

    // Atualizar o status das ações selecionadas
    if (!empty($acoes_selecionadas)) {
        $placeholders = implode(',', array_fill(0, count($acoes_selecionadas), '?'));
        $sql = "UPDATE acoes SET status = ? WHERE id IN ($placeholders)";
        $stmt = $pdo->prepare($sql);
        $params = array_merge([$status], $acoes_selecionadas);
        $stmt->execute($params);

        echo "Status atualizado com sucesso!";
    } else {
        echo "Nenhuma ação selecionada.";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}