<script setup lant="ts">
  import { reactive } from 'vue'

  const scenario = reactive({
    title: 'Cenário – Cadastro de Clientes do ERP',
    steps: [
      {
        description:
          '1 – O ERP é utilizado por mais de 1000 clientes, seu banco de dados é único.',
      },
      {
        description:
          '2 – Todas as tabelas do ERP possuem uma coluna chamada empresa, que determina qual é a empresa detentora daquele registro.',
      },
      {
        description:
          '3 – Todas os relacionamentos de tabelas são baseados em mais de uma chave, ou seja, as chaves primárias e estrangeiras são compostas por mais de uma coluna.',
      },
    ],
  })

  const tablesScenario = reactive([
    {
      name: 'Empresa',
      rows: [
        {
          name: 'recnum',
          type: 'bigint',
          size: '20',
          description: 'Unique/auto increment',
        },
        { name: 'codigo', type: 'decimal', size: '4,0', description: 'PK' },
        { name: 'empresa', type: 'decimal', size: '4,0', description: '' },
        { name: 'sigla', type: 'varchar', size: '40', description: '' },
        { name: 'razao_social', type: 'varchar', size: '255', description: '' },
      ],
    },
    {
      name: 'Cliente',
      rows: [
        {
          name: 'recnum',
          type: 'bigint',
          size: '20',
          description: 'Unique/auto increment',
        },
        {
          name: 'empresa',
          type: 'decimal',
          size: '4,0',
          description: 'PK → faz relação com empresa->codigo',
        },
        {
          name: 'codigo',
          type: 'decimal',
          size: '14,0',
          description: 'PK (código do cliente)',
        },
        { name: 'razao_social', type: 'varchar', size: '255', description: '' },
        { name: 'tipo', type: 'enum', size: '(PJ,PF)', description: '' },
        { name: 'cpf_cnpj', type: 'varchar', size: '14', description: '' },
      ],
    },
  ])

  const whatToDo = reactive([
    {
      description: "1 - Baseado no cenário acima e na tabela empresa crie uma API simples com as rotas citadas abaixo em Laravel:", 
      list: [
          {item: "Story"},
          {item: "Update"},
          {item: "Destroy"},
          {item: "Show"},
          {item: "Index(list all)"},
        ]
    },
    {
      description: "2 - Baseado no cenário acima e na tabela empresa crie uma API simples com as rotas citadas abaixo em Laravel:", 
      list: [
          {item: "Story"},
          {item: "Update"},
          {item: "Destroy"},
          {item: "Show"},
          {item: "Index(list all)"},
        ]
    },
    {
      description: "3 – Criar uma tela em VueJS para consumir as rotas citadas no item 1 “Cadastro de Empresas”, ou seja, a tela deverá apresentar todas as empresas cadastradas, com possibilidade de inclusão, alteração e exclusão.", 
      list: []
    },
    {
      description: "4 – Criar uma tela em VueJS para consumir as rotas citadas no item 2 “Cadastro de Clientes”, ou seja, a tela deverá apresentar todas as empresas cadastradas, com possibilidade de inclusão, alteração e exclusão.", 
      list: []
    },
  ])
</script>
<template>
  <div class="card">
    <div class="card-header" style="border: none; background: #fff">
      <div class="container border-bottom  d-flex flex-column jstify-content-center pt-3 pb-1" >
        <h3 class="text-muted mb-0">Cenário</h3>
        <p class="text-muted" style="font-size: 1.1rem;">Descrição e Requisitos Básicos</p>
      </div>
    </div>
    <div class="card-body p-5 pt-4">
      <h4 class="card-title">{{ scenario.title }}</h4>
      <br />

      <p
        v-for="step in scenario.steps"
        :key="step.description"
        class="card-text"
      >
        {{ step.description }}
      </p>
      <br />
      
      <h5 class="card-title">Tabelas do Cenário</h5>
      <br />
      <div>
        <div v-for="table in tablesScenario" :key="table.name">
          <h5>{{ table.name }}</h5>
          <table class="table">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Tamanho</th>
                <th>Descrição</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="row in table.rows" :key="row.name">
                <td>{{ row.name }}</td>
                <td>{{ row.type }}</td>
                <td>{{ row.size }}</td>
                <td>{{ row.description }}</td>
              </tr>
            </tbody>
          </table>
          <br/>
        </div>
      </div>


      <h5>O que fazer?</h5>
      <div>
        <div v-for="(task, index) in whatToDo" :key="index">
          <p>{{ task.description }}</p>
          <ul v-if="task.list.length > 0">
            <li v-for="(item, itemIndex) in task.list" :key="itemIndex">
              {{ item.item }}
            </li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</template>
<style scoped></style>
