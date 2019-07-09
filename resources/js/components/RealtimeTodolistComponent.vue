<template>
  <div class="container">
    <div class="row">
      <div class="col-8">
        <ul class="list-group">
          <li
            class="list-group-item"
            v-for="list in lists"
            :key="list.id"
            :title="[list.todo_status == 1 ? 'Done Todo' : '']"
            :class="[ list.todo_status == 1 ? 'line-through' : '' ]"
          >
            <button
              class="btn btn-default"
              :class="[ list.todo_status == 1 ? 'btn-success disabled' : '' ]"
              :disabled="(list.todo_status == 1)"
            >{{ list.todo_name }}</button>
          </li>
        </ul>
      </div>
      <div class="col-4">
        <form>
          <div class="form-group">
            <input type="text" v-model="todo_name" class="form-control" />
          </div>
          <div class="form-group">
            <button class="btn btn-success" @click="createTodo" type="button">Create Todo List</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      lists: [],
      todo_name: ""
    };
  },
  props: ["authUser"],
  methods: {
    fetchTodos() {
      axios
        .get("/v1/todo")
        .then(({ data }) => {
          this.lists = data.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    createTodo() {
      axios
        .post("/v1/todo", {
          todo: this.todo_name
        })
        .then(response => {
          console.log(response);
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  created() {
    this.fetchTodos();
  },
  mounted() {
    Echo.channel("laravel_database_todo-was-created").listen(
      "TodoWasCreatedEvent",
      e => {
        alert("New Todo Was Created");
        this.lists.push(e.todo);
        console.log(e.todo);
      }
    );
  }
};
</script>

<style>
.line-through {
  text-decoration: line-through;
}
</style>
