<?php
class Migration_Cria_tabelas_orcamento extends CI_MIgration{

    public function up(){
        #cria tabela de users
        $this->dbforge->add_field([
            'id' => [
                'type' => "INT",
                'auto_increment' => true,
                'null' => false
            ],
            'email' => [
                'type' => "VARCHAR",
                'constraint' => "255",
                'null'=> false
            ],
            'nome' => [
                'type' => "VARCHAR",
                'constraint' => "255",
                'null'=> false
            ],
             'senha' => [
                'type' => "VARCHAR",
                'constraint' => "255",
                'null'=> false
            ]
        ]);
        $this->dbforge->add_key("id", true);
        $this->dbforge->create_table("usuarios");
        #cria tabela de categorias
        $this->dbforge->add_field([
            'id' => [
                'type' => "INT",
                'auto_increment' => true,
                'null' => false
            ],
            'nome'=> [
                'type' => "VARCHAR",
                'constraint' => "255",
                'null' => false,
            ],
            'saldo' => [
                'type' => 'decimal',
                'constraint' => "10, 2",
                'null' => false
            ],
            'usuario_id' => [
                'type' => "INT",
                'null' => false
            ]
        ]);
        $this->dbforge->add_key("id", true);
        $this->dbforge->create_table("categorias");
        #cria tabela lançamentos
        $this->dbforge->add_field([
            'id'=> [
                'type' => 'INT',
                'auto_increment' => true,
                'null' => false
            ],
            'valor' => [
                'type' => 'decimal',
                'constraint' => '10, 2',
                'null' => false
            ],
            'operacao' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false
            ],
            'descricao' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'data' => [
                'type' => 'date',
                'null' => false
            ],
            'usuario_id' => [
                'type' => 'INT',
                'null' => false
            ],
            'categoria_id' => [
                'type' => 'INT',
                'null' => false
            ]

        ]);
        $this->dbforge->add_key("id", true);
        $this->dbforge->create_table("lancamentos");

    }

    public function down(){
        $this->dbforge_>drop_table("categorias");
        $this->dbforge_>drop_table("lancamentos");
        $this->dbforge_>drop_table("usuarios");
    }
}