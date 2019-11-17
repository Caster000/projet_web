/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('personne', {
    'id_personne': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      primaryKey: true,
      comment: "null",
      autoIncrement: true
    },
    'nom': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    },
    'prenom': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    },
    'email': {
      type: DataTypes.STRING(254),
      allowNull: true,
      comment: "null"
    },
    'password': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    },
    'id_role': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      comment: "null",
      references: {
        model: 'role',
        key: 'id_role'
      }
    },
    'id_campus': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      comment: "null",
      references: {
        model: 'campus',
        key: 'id_campus'
      }
    }
  }, {
    tableName: 'personne'
  });
};
