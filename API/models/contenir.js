/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('contenir', {
    'id_produit': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      comment: "null",
      references: {
        model: 'produit',
        key: 'id_produit'
      }
    },
    'id_commande': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      comment: "null",
      references: {
        model: 'commande',
        key: 'id_commande'
      }
    },
    'Quantite': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      comment: "null"
    }
  }, {
    tableName: 'contenir'
  });
};
