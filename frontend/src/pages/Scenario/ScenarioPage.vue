<script setup lang="ts">
import  CustomCard  from '@components/CustomCard.vue'
import {scenario, tablesScenario, whatToDo} from './data'
</script>

<template>
    <div>
        <CustomCard card-title="Cenário" short-description="Descrição e Requisitos Básicos">
            <div>
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
        </CustomCard>
    </div>
</template>
