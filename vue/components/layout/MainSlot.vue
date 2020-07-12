<template>
  <v-app id="inspire">
    <v-navigation-drawer
      :color="color"
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      dark
      hide-overlay
      app
    >
      <v-list dense>
        <template v-for="item in items">
          <v-row v-if="item.heading" :key="item.heading" align="center">
            <v-col cols="6">
              <v-subheader class="test" v-if="item.heading">{{ item.heading }}</v-subheader>
            </v-col>
            <v-col cols="6" class="text-center">
              <a href="#!" class="body-2 black--text">EDIT</a>
            </v-col>
          </v-row>
          <v-list-group
            v-else-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon
          >
            <template v-slot:activator>
              <v-list-item-content>
                <v-list-item-title router :to="item.route" class="test">{{ item.text }}</v-list-item-title>
              </v-list-item-content>
            </template>
            <v-list-item v-for="(child, i) in item.children" :key="i" link>
              <v-list-item-action v-if="child.icon">
                <v-icon>{{ child.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title class="test">{{ child.text }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
          <v-list-item v-else :key="item.text" link router :to="item.route">
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title class="test">{{ item.text }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar :clipped-left="$vuetify.breakpoint.lgAndUp" app color="brown darken-4" dark>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title style="width: 300px" class="ml-0 pl-4">
        <span class="hidden-sm-and-down">CARAVANE</span>
      </v-toolbar-title>
      <v-text-field
        flat
        solo-inverted
        hide-details
        prepend-inner-icon="mdi-magnify"
        label="Search"
        class="hidden-sm-and-down"
      ></v-text-field>
      <v-spacer></v-spacer>
      <v-btn icon>
        <v-icon>mdi-apps</v-icon>
      </v-btn>
      <div class="text-center">
        <v-menu transition="fade-transition">
          <template v-slot:activator="{ on, attrs }">
            <v-btn dark color="primary" v-bind="attrs" v-on="on">
              Notifications
              <v-badge :content="notification" :value="notification" color="green" overlap>
                <v-icon>mdi-bell</v-icon>
              </v-badge>
            </v-btn>
          </template>
          <v-card max-width="450" class="mx-auto">
            <v-toolbar color="cyan" dark>
              <v-toolbar-title>NOTIFICATIONS</v-toolbar-title>

              <v-spacer></v-spacer>
            </v-toolbar>

            <v-list three-line>
              <template v-for="(item, index) in produits">
                <v-subheader v-if="item.header" :key="item.header" v-text="item.header"></v-subheader>

                <v-divider v-else-if="item.divider" :key="index" :inset="item.inset"></v-divider>

                <v-list-item v-else :key="item.title" @click>
                  <!-- <v-list-item-avatar>
                    <v-img :src="item.avatar"></v-img>
                  </v-list-item-avatar>-->

                  <v-list-item-content>
                    <v-list-item-title>{{item.produit.designation}}</v-list-item-title>
                    <v-list-item-subtitle>
                      <span class="text--primary">
                        Il ne reste que
                        <v-chip color="red" small dark>
                          <span style="font-Weight:bold">{{item.stockFinal}}</span>
                        </v-chip>
                        {{item.produit.designation}} de la catégorie {{item.produit.categorie.libelle}} du fournisseur {{item.produit.fournisseur.structure}}
                      </span>
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
              </template>
            </v-list>
          </v-card>
          <!-- <v-list>
            <v-list-item v-for="n in 5" :key="n" @click>
              <v-list-item-title v-text="'Item ' + n"></v-list-item-title>
            </v-list-item>
          </v-list>-->
        </v-menu>
      </div>
      <v-btn icon @click="signOut">
        <v-icon>mdi-power</v-icon>
      </v-btn>
    </v-app-bar>
    <v-content>
      <router-view />
    </v-content>
  </v-app>
</template>

<script>
//import ItemErrors from "../.././components/layout/errors/ItemErrors";
import { mapActions } from "vuex";
//import axios from "../../interceptor";
export default {
  props: {
    source: String
  },
  data: () => ({
    notification: 0,
    produits: [],
    dialog: false,
    drawer: true,
    color: "brown darken-4",
    items: [
      { text: "Utilisateurs", icon: "account_circle", route: "/user/list" },
      { text: "Clients", icon: "contact_phone", route: "/client" },
      { icon: "mdi-contacts", text: "Fournisseur", route: "/fournisseur" },
      { text: "Categorie", icon: "storage", route: "/categorie" },
      { text: "Produit", icon: "shopping_cart", route: "/produit" },
      { text: "Stock", icon: "assignment", route: "/depot" },
      { text: "Vente", icon: "storefront", route: "/vente" },
      { text: "Caisse", icon: "monetization_on", route: "/caisse" },
      {
        text: "Opération de caisse",
        icon: "monetization_on",
        route: "/operation/caisse"
      }
      //mdiClipboardList
      // { icon: "mdi-history", text: "Frequently contacted" },
      // { icon: "mdi-content-copy", text: "Duplicates" },
      // {
      //   icon: "mdi-chevron-up",
      //   "icon-alt": "mdi-chevron-down",
      //   text: "Labels",
      //   model: true,
      //   children: [{ icon: "mdi-plus", text: "Create label" }]
      // },
      // {
      //   icon: "mdi-chevron-up",
      //   "icon-alt": "mdi-chevron-down",
      //   text: "More",
      //   model: false,
      //   children: [
      //     { text: "Import" },
      //     { text: "Export" },
      //     { text: "Print" },
      //     { text: "Undo changes" },
      //     { text: "Other contacts" }
      //   ]
      // },
    ],
    itemse: [
      // { header: "Today" },
      {
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
        title: "Brunch this weekend?",
        subtitle:
          "<span class='text--primary'>Ali Connors</span> &mdash; I'll be in your neighborhood doing errands this weekend. Do you want to hang out?"
      },
      { divider: true, inset: true },
      {
        avatar: "https://cdn.vuetifyjs.com/images/lists/2.jpg",
        title: 'Summer BBQ <span class="grey--text text--lighten-1">4</span>',
        subtitle:
          "<span class='text--primary'>to Alex, Scott, Jennifer</span> &mdash; Wish I could come, but I'm out of town this weekend."
      },
      { divider: true, inset: true },
      {
        avatar: "https://cdn.vuetifyjs.com/images/lists/3.jpg",
        title: "Oui oui",
        subtitle:
          "<span class='text--primary'>Sandra Adams</span> &mdash; Do you have Paris recommendations? Have you ever been?"
      },
      { divider: true, inset: true },
      {
        avatar: "https://cdn.vuetifyjs.com/images/lists/4.jpg",
        title: "Birthday gift",
        subtitle:
          "<span class='text--primary'>Trevor Hansen</span> &mdash; Have any ideas about what we should get Heidi for her birthday?"
      },
      { divider: true, inset: true },
      {
        avatar: "https://cdn.vuetifyjs.com/images/lists/5.jpg",
        title: "Recipe to try",
        subtitle:
          "<span class='text--primary'>Britta Holt</span> &mdash; We should eat this: Grate, Squash, Corn, and tomatillo Tacos."
      }
    ]
  }),

  methods: {
    ...mapActions({
      getDepots: "depot/getDepots"
    }),
    signOut() {
      this.$store.dispatch("auth/logout");
    },
    notifi() {
      this.getDepots().then(resp => {
        resp.forEach(prod => {
          if (prod.stockFinal <= 3) {
            this.produits.push(prod);
            this.produits.push({ divider: true, inset: true });
            this.notification++;
          }
        });
        console.log(this.produits);
      });
    }
  },
  created() {
    this.notifi();
  }
};
</script>
<style lang="scss" >
.test {
  font-size: 15px !important;
}
.v-navigation-drawer {
  .v-list {
    &-group--active {
      .v-list-group__items {
        background: #61432bc9 !important;
      }
      .v-list-group__header {
        background: #61432bc9 !important;
      }
      .v-list-item-title {
        font-size: 40px !important;
      }
    }
    .theme--dark {
      .v-icon {
        color: #fff !important;
      }
      .v-list-item-content {
        font-size: 40px !important;
      }
    }
  }
}
.active-item {
  position: relative !important;
  &::before {
    content: "" !important;
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    opacity: 0.3 !important;
    background-color: #61432bc9 !important;
  }
}

.v-list-item-title {
  font-size: 40px !important;
}
</style>