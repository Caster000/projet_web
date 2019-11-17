/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('commande', {
    'id_commande': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      primaryKey: true,
      comment: "null",
      autoIncrement: true
    },
    'valider': {
      type: DataTypes.INTEGER(1),
      allowNull: false,
      comment: "null"
    },
    'id_personne': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      comment: "null",
      references: {
        model: 'personne',
        key: 'id_personne'
      }
    }
  }, {
    tableName: 'commande'
  });
};
