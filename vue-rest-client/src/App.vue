<template>
  <div>
    <div v-if="users != ''">
      <ul v-for="user in users.values" :key="user.id">
        <li>
          <span>{{ user.first_name }}</span> &#160;
          <button @click="edit(user)">Edit</button> ||
          <button @click="del(user)">Delete</button>
        </li>
      </ul>
    </div>
    <div v-else>
      <label>Empty Data</label>
    </div>
    <form @submit.prevent="add">
      <input type="hidden" v-model="form.id" />
      <input type="text" v-model="form.first_name" />
      <input type="text" v-model="form.last_name" />
      <button type="submit" v-show="!updateSubmit">add</button>
      <button type="button" v-show="updateSubmit" @click="update(form)">
        Update
      </button>
    </form>
  </div>
</template>
<script>
/* eslint-disable */
export default {
  data() {
    return {
      form: {
        id: "",
        first_name: "",
        last_name: "",
      },
      users: "",
      updateSubmit: false,
    };
  },
  mounted() {
    this.load();
  },
  methods: {
    load() {
      this.$api
        .get("users")
        .then((res) => {
          this.users = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    add() {
      this.$api
        .post("users", this.form)
        .then((res) => {
          this.load();
          this.form.first_name = "";
          this.form.last_name = "";
        })
        .catch((err) => {
          console.log(err);
        });
    },
    edit(user) {
      this.updateSubmit = true;
      this.form.id = user.id;
      this.form.first_name = user.first_name;
      this.form.last_name = user.last_name;
    },
    update(form) {
      return this.$api
        .put("users", {
          user_id: this.form.id,
          first_name: this.form.first_name,
          last_name: this.form.last_name,
        })
        .then((res) => {
          this.load();
          this.form.id = ""
          this.form.first_name = ""
          this.form.last_name = ""
          this.updateSubmit = false
          console.log(res)
        })
        .catch((err) => {
          console.log(err);
        });
    },
    del(user) {
      this.$api({
        method: 'delete',
        url: 'users',
        data: {user_id: user.id}
      })
      .then((res)=>{
        this.load()
      })
    },
  },
};
</script>
